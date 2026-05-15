<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Cmt;

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
        
        
        $cmtCha = Cmt::where('blog_id', $id)
                     ->where('level', 0)
                     ->orderBy('id', 'desc')
                     ->get();
        $cmtCon = [];
            foreach($cmtCha as $cmt) {
                $cmtCon[$cmt->id] = Cmt::where('level', $cmt->id)->get();
            }
        $baiVietTruoc = Blog::where('id', '<', $blogDetail->id)->orderBy('id', 'desc')->first();
        $baiVietTiep = Blog::where('id', '>', $blogDetail->id)->orderBy('id', 'asc')->first();

        return view('frontend.blog.detail', compact(
            'blogDetail',
            'baiVietTruoc',
            'baiVietTiep',
            'rate',
            'cmtCha',
            'cmtCon'
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
    public function cmtBlog(Request $request){
        $cmt =  $request->cmt;
        $blogId = $request->blog_id;
        $userId = $request->user_id;
        $user = Auth::user();

        $level = $request->level ?? 0; 
        
        $data = Cmt::create([
            'cmt' => $cmt,
            'blog_id' => $blogId,
            'user_id' => $userId,
            'name' => $user->name,
            'avatar' => $user->avatar,
            'level' => $level
        ]);
        
        return response()->json(['data' => $data]);
    }
    public function indexCmtBlog () {
        
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
