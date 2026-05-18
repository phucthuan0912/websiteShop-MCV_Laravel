<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.list', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        if (Category::create($data)) {
            return redirect()->route('admin.category.list')->with('success', 'Thêm danh mục thành công');
        } else {
            return redirect()->back()->with('error', 'Thêm danh mục thất bại');
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Xóa danh mục thành công');
    }
}
