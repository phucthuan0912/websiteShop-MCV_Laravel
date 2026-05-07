<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MemberRegisterRequest;
use App\Http\Requests\MemberLoginRequest;
use App\Models\User;
class UserController extends Controller
{
      public function __construct(){
    $this->middleware('auth')->except(['loginIndex', 'registerIndex', 'loginPost', 'registerPost']);
    }

    /**
     * Display a listing of the resource.
     */
    public function registerIndex()
    {
        
        return view('frontend.member.register');
    }
    public function loginIndex()
    {
        
        return view('frontend.member.login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('member.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function registerPost(MemberRegisterRequest $request)
    {
        
        $data = $request->validated();
        $data['level'] = 0;
        $file = $request->avatar;
        
         if(!empty($file)&& $file->isValid()) {
            $data['avatar'] = $file->getClientOriginalName();
        }
        if(User::create($data)){
            if(!empty($file)) {
                $file->move(public_path('frontend/uploads/avatar'), $file->getClientOriginalName());
            }
            return redirect()->route('member.login')->with('success','');
        }else{
            return redirect()->route('member.register')->with('error','');
        }
    }
    public function loginPost(MemberLoginRequest $request){
        $login = [
            'name' => $request->name,
            'password' => $request->password, 
            'level' => 0
        ];
        if(Auth::attempt($login)){
            return redirect()->route('frontend.home');
        }else{
            return redirect()->route('member.login')->with('error','');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
