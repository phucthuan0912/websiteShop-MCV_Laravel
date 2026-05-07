<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;
use App\Models\Blog;
use Auth; 
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexList()
    {
       $blog = Blog::orderByDesc('id')->paginate(3);
        foreach ($blog as $item) {
        $item->rate = Rate::where('blog_id', $item->id)->avg('rate');
        }
        return view ('frontend.blog.list', compact('blog'));
    }
   public function indexDetailBlog($id)
    {
        $blogDetail = Blog::findOrFail($id);

        $rate = Rate::where('blog_id', $id)
                    ->where('user_id', Auth::id())
                    ->value('rate');

        $baiVietTruoc = Blog::where('id', '<', $blogDetail->id)->orderBy('id', 'desc')->first();
        $baiVietTiep = Blog::where('id', '>', $blogDetail->id)->orderBy('id', 'asc')->first();

        return view('frontend.blog.detail', compact(
            'blogDetail',
            'baiVietTruoc',
            'baiVietTiep',
            'rate'
        ));
    }
    public function rateBlog(Request $request){
        $rate = $request->rate;
        $blogId = $request->blog_id;
        $userId = $request->user_id;
  

        Rate::updateOrInsert(
            [
                'blog_id'=>$blogId,
                'user_id'=> $userId
            ],
            ['rate' => $rate]
        );
        return response()->json([
            'status' => 'succses'
        ]);
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
