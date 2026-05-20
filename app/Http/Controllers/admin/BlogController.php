<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BlogRequest;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $blog = Blog::all();
        return view('admin.blog.list', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {

        $file = $request->image;
        $data = $request->validated();
         if(!empty($file)) {
            $data['image'] = $file->getClientOriginalName();
        }
        if(Blog::create($data)){
            if(!empty($file)) {
                $file->move(public_path('frontend/uploads/avatar'), $file->getClientOriginalName());
            }   
            return redirect()->route('admin.blog.list')->with('success', 'Country created successfully');
        }else{
            return redirect()->back()->with('error');
        }
    }
    public function destroy($id){
        $data = Blog::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Blog deleted successfully');
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
    public function edit($id)
    {
        $data = Blog::find($id);
        return view('admin.blog.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request)
    {
        $blog = Blog::find($request->id);
        $data = $request->validated();
        $file = $request->image;
         if(!empty($file)) {
            $data['image'] = $file->getClientOriginalName();
        }
        if($blog->update($data)){
             if(!empty($file)) {
                $file->move(public_path('frontend/uploads/avatar'), $file->getClientOriginalName());
            }
            return redirect()->route('admin.blog.list')->with('success', ' successfully');
        }else{
            return redirect()->back()->with('error', '');
        }

    }

    
}
