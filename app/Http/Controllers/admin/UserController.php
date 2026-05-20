<?php

namespace App\Http\Controllers\Admin;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $address = Country::all(['id', 'name'])->toArray();
       
       return view('admin.user.profile', compact('user', 'address'));
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
    public function store(Request $request)
    {
        //
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
    
    public function update(ProfileRequest $request)
    {
        $user = Auth::user();
        $file = $request->avatar;
        $data = $request->all();

        if(!empty($file)&& $file->isValid()) {
            $data['avatar'] = $file->getClientOriginalName();
        }

        if($data['password']){
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] =$user->password;
        }
        if($user->update($data)){
            if(!empty($file)) {
                $file->move(public_path('admin/uploads/avatar'), $file->getClientOriginalName());
            }
            return redirect()->route('admin.user.profile')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->back()->with('error', 'Cập nhật thất bại');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
