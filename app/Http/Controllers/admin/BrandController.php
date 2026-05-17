<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.list', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function storeBrand(BrandRequest $request)
    {
        $data = $request->validated();

        if (Brand::create($data)) {
            return redirect()->route('admin.brand.list')->with('success', 'Thêm thương hiệu thành công');
        } else {
            return redirect()->back()->with('error', 'Thêm thương hiệu thất bại');
        }
    }

    public function deleteBrand($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->back()->with('success', 'Xóa thương hiệu thành công');
    }
}