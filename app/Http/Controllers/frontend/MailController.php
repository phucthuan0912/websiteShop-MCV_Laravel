<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Http\Request;
use App\Http\Requests\MemberRegisterRequest;
use Mail;
use App\Models\User;
use App\Mail\MailNotify;
use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB;
class MailController extends Controller
{
    public function index() {
        $cart = session()->get('cart', []);
        $tax = 2;
        $subTotal = 0;
        foreach ($cart as $item){
            $subTotal += $item['price'] * $item['quantity'];
        }
        $data = [
            'body' => "Thank you for your order! Below are your order details:",
            'cart'  => $cart,
            'total' => $subTotal + $tax
        ];
        try{ 
            $user = Auth::user();
            History::create([
            'email'   => $user->email,
            'phone'   => $user->phone,
            'name'    => $user->name,
            'id_user' => $user->id,
            'price'   => $subTotal,
            ]);
            Mail::to($user->email)->send(new MailNotify($data));
            return redirect()->back()->with('success', 'Order placed, storage History and invoice sent successfully!');
        } catch(\Exception $th) {
            return back()->with('error', 'Sorry, I can bot send the email right now. Error details: ' . $th->getMessage());
        }
    }

    public function registerMail(MemberRegisterRequest $request)
    {
        $data = $request->validated();
        $data['level'] = 0;
        $data['password'] = bcrypt($data['password']); 
        $file = $request->avatar;
        
         if(!empty($file)&& $file->isValid()) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $data['avatar'] = $filename;
        }
        $user = User::create($data);
        if ($user) {
            if(!empty($file)) {
                $file->move(public_path('admin/uploads/avatar'), $filename);
            }
            Auth::login($user);
            return redirect()->route('member.checkout')->with('success','Registration successful! Please proceed with payment.');
        }else{
            return redirect()->route('member.checkout')->with('error','An error occurred, please try again!');
        }
    }

}


