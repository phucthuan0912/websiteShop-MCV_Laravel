<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\frontend\AccountController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/admin/dashboard',[App\Http\Controllers\admin\DashboardController::class,'index'])->name('admin.dashboard');
Route::get('/admin/user/profile',[App\Http\Controllers\admin\UserController::class,'index'])->name('admin.user.profile');
Route::post('/admin/user/profile',[App\Http\Controllers\admin\UserController::class,'update'])->name('admin.user.profile');

Route::get('admin/country',[App\Http\Controllers\admin\CountryController::class,'index'])->name('admin.country.list');
Route::get('admin/country/create',[App\Http\Controllers\admin\CountryController::class,'create'])->name('admin.country.create');
Route::post('admin/country/create',[App\Http\Controllers\admin\CountryController::class,'store'])->name('admin.country.create');
Route::get('admin/country/delete/{id}',[App\Http\Controllers\admin\CountryController::class,'destroy'])->name('admin.country.delete');

Route::get('admin/blog',[App\Http\Controllers\admin\BlogController::class,'index'])->name('admin.blog.list');
Route::get('admin/blog/create',[App\Http\Controllers\admin\BlogController::class, 'create'])->name('admin.blog.create');
Route::post('admin/blog/create',[App\Http\Controllers\admin\BlogController::class, 'store'])->name('admin.blog.create');
Route::get('admin/blog/delete/{id}',[App\Http\Controllers\admin\BlogController::class, 'destroy'])->name('admin.blog.delete');
Route::get('admin/blog/edit/{id}',[App\Http\Controllers\admin\BlogController::class,'edit'])->name('admin.blog.edit'); 
Route::post('admin/blog/update/{id}',[App\Http\Controllers\admin\BlogController::class,'update'])->name('admin.blog.update');   

Route::get('admin/category',[App\Http\Controllers\admin\CategoryController::class,'index'])->name('admin.category.list');
Route::get('admin/category/create',[App\Http\Controllers\admin\CategoryController::class, 'create'])->name('admin.category.create');
Route::post('admin/category/create',[App\Http\Controllers\admin\CategoryController::class, 'store'])->name('admin.category.create');
Route::get('admin/category/delete/{id}',[App\Http\Controllers\admin\CategoryController::class, 'destroy'])->name('admin.category.delete');

Route::get('admin/brand',[App\Http\Controllers\admin\BrandController::class,'index'])->name('admin.brand.list');
Route::get('admin/brand/create',[App\Http\Controllers\admin\BrandController::class, 'create'])->name('admin.brand.create');
Route::post('admin/brand/create',[App\Http\Controllers\admin\BrandController::class, 'store'])->name('admin.brand.create');
Route::get('admin/brand/delete/{id}',[App\Http\Controllers\admin\BrandController::class, 'destroy'])->name('admin.brand.delete');

Route::get('frontend/home',[App\Http\Controllers\frontend\HomeController::class,'index'])->name('frontend.home');
Route::get('member/register',[App\Http\Controllers\frontend\UserController::class,'registerIndex'])->name('member.register');
Route::post('member/register',[App\Http\Controllers\frontend\UserController::class,'registerPost'])->name('member.register.post');
Route::post('member/login',[App\Http\Controllers\frontend\UserController::class,'loginPost'])->name('member.login.post');
Route::get('member/login',[App\Http\Controllers\frontend\UserController::class,'loginIndex'])->name('member.login');
Route::post('member/logout', [App\Http\Controllers\frontend\UserController::class, 'logout'])->name('member.logout');

Route::get('member/blog',[App\Http\Controllers\frontend\BlogController::class, 'indexList'])->name('member.blog');
Route::get('member/blog/detail/{id}',[App\Http\Controllers\frontend\BlogController::class, 'indexDetailBlog'])->name('member.blog.detail');
Route::post('member/blog/rate/ajax',[App\Http\Controllers\frontend\BlogController::class, 'rateBlog'])->name('member.blog.rate');
Route::post('member/blog/cmt/ajax',[App\Http\Controllers\frontend\BlogController::class, 'cmtBlog'])->name('member.blog.cmt');

Route::get('account/update',[App\Http\Controllers\frontend\AccountController::class, 'index'])->name('account.profile');
Route::post('account/update',[App\Http\Controllers\frontend\AccountController::class, 'update'])->name('account.update');

Route::get('account/my-product',[App\Http\Controllers\frontend\MyProductController::class, 'index'])->name('myproduct.index');
Route::get('account/my-product/create',[App\Http\Controllers\frontend\MyProductController::class, 'create'])->name('myproduct.create');
Route::post('account/my-product',[App\Http\Controllers\frontend\MyProductController::class, 'store'])->name('myproduct.store');
Route::get('account/my-product/{id}',[App\Http\Controllers\frontend\MyProductController::class, 'edit'])->name('myproduct.edit');
Route::put('account/my-product/{id}',[App\Http\Controllers\frontend\MyProductController::class, 'update'])->name('myproduct.update');
Route::get('account/my-product/delete/{id}',[App\Http\Controllers\frontend\MyProductController::class, 'delete'])->name('myproduct.delete');

