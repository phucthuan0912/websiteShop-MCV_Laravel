<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexList()
    {
        $blog = Blog::orderByDesc('id')->paginate(3);
        return view ('frontend.blog.list', compact('blog'));
    }
    public function indexDetailBlog(String $id)
    {
        $blogDetail = Blog::find($id);
        $baiVietTruoc = Blog::where('id', '<', $blogDetail->id)->orderBy('id', 'desc')->first();
        $baiVietTiep = Blog::where('id', '>', $blogDetail->id)->orderBy('id', 'asc')->first();
        return view ('frontend.blog.detail', compact('blogDetail','baiVietTruoc','baiVietTiep'));
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
