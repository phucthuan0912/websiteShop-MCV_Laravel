<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class MyProductController extends Controller
{
    public function index() {
        $products = Product::all();

        foreach($products as $product) {
            if($product->status == 1) {
                $product->final_price = $product->price - ($product->price * $product->sale / 100);
            } else {
                $product->final_price = $product->price;
            }
        }
        
        return view('frontend.myproduct.index', compact('products'));
    }

    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('frontend.myproduct.create', compact('categories', 'brands'));
    }

    public function store(ProductRequest $request){
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        
        if ($data['status'] == 0) {
            $data['sale'] = 0;
        } 
        $files = $request->image;
        $imageNames = [];
        if(!empty($files) && is_array($files)) {
            foreach($files as $file) {
                if($file->isValid()) {
                    $imageNames[] = $file->getClientOriginalName();
                }
            }
        }
        
        $data['image'] = json_encode($imageNames);

        if (Product::create($data)) {
            
            if(!empty($files)) {
                foreach($files as $file) {
                    if($file->isValid()) {
                        $file->move(public_path('frontend/uploads/products'), $file->getClientOriginalName());
                    }
                }
            }
            return redirect()->route('myproduct.index')->with('success', 'Sản phẩm đã được thêm thành công');
        } else {
            return redirect()->back()->with('error', 'Thêm sản phẩm thất bại');
        }
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();

        return view('frontend.myproduct.edit', compact('product', 'categories', 'brands'));
    }
    
    public function update(ProductRequest $request, $id){
        $product = Product::findOrFail($id);
        $data = $request->validated();
        
        if ($data['status'] == 0) {
            $data['sale'] = 0;
        }
        
      
        $hinhCu = $product->images;
        $hinhXoa = $request->input('hinhxoa', []);
        $hinhConLai = [];
        
        foreach($hinhCu as $hinh) {
            if (!in_array($hinh, $hinhXoa)) {
                $hinhConLai[] = $hinh; 
            }
        }
        
        $hinhMoi = [];
        if($request->hasFile('image')) {
            $files = $request->image;
            foreach($files as $file) {
                if($file->isValid()) {
                    $hinhMoi[] = $file->getClientOriginalName();
                }
            }
        }
        
        $tongHinh = array_merge($hinhConLai, $hinhMoi);

        if (count($tongHinh) > 3) {
            return redirect()->back()->with('error', 'Tổng số ảnh không được vượt quá 3');
        }
        if (count($tongHinh) < 1) {
            return redirect()->back()->with('error', 'Sản phẩm phải có ít nhất 1 ảnh');
        }
        
        $data['image'] = json_encode($tongHinh);
            
        if ($product->update($data)) {
            if(!empty($hinhMoi)) {
                foreach($files as $file) {
                    if($file->isValid()) {
                        $file->move(public_path('frontend/uploads/products'), $file->getClientOriginalName());
                    }
                }
            }
            return redirect()->route('myproduct.index')->with('success', 'Sản phẩm đã được cập nhật thành công');
        } else {
            return redirect()->back()->with('error', 'Cập nhật sản phẩm thất bại');
        }
    }
    public function delete($id){
        $del = Product::find($id);
        $del->delete();
        return redirect()->back()->with('success', 'Xóa san pham thành công');
    }
}
