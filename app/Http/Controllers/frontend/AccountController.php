<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use App\Models\Country;
<<<<<<< HEAD

=======
>>>>>>> feature/product-detail
class AccountController extends Controller
{
    public function index(){
        $user = Auth::user();
<<<<<<< HEAD
        $address = Country::all(['id', 'name'])->toArray();
        return view ('frontend.account.profile', compact('user','address'));
=======
        $address = Country::select('id', 'name')->get()->toArray();
        return view ('frontend.account.profile', compact('user','address'));
    }

    public function indexProduct() {
        return view ('frontend.account.myproduct');
>>>>>>> feature/product-detail
    }

    public function update(ProfileRequest $request){
        $user = Auth::user();
        $file = $request->avatar;
        $data = $request->except(['password', 'avatar']); 
 
        if($request->filled('password')){
            $data['password'] = bcrypt($request->password);
        }

        if(!empty($file) && $file->isValid()) {
            $data['avatar'] = $file->getClientOriginalName();
        }

        if($user->update($data)){
            if(!empty($file)) {
                // Xóa ảnh cũ nếu tồn tại
                if($user->avatar && file_exists(public_path('admin/uploads/avatar/' . $user->avatar))) {
                    unlink(public_path('admin/uploads/avatar/' . $user->avatar));
                }
                // Upload ảnh mới
                $file->move(public_path('admin/uploads/avatar'), $file->getClientOriginalName());
            }
            return redirect()->route('account.profile')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->back()->with('error', 'Cập nhật thất bại');
        }
    }
}
