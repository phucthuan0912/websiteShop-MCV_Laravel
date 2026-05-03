<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\UserController;
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
Route::post('admin/country/create',[App\Http\Controllers\admin\CountryController::class,'storeCountry'])->name('admin.country.create');
Route::get('admin/country/delete/{id}',[App\Http\Controllers\admin\CountryController::class,'deleteCountry'])->name('admin.country.delete');

Route::get('admin/blog',[App\Http\Controllers\admin\BlogController::class,'index'])->name('admin.blog.list');
Route::get('admin/blog/create',[App\Http\Controllers\admin\BlogController::class, 'create'])->name('admin.blog.create');
Route::post('admin/blog/create',[App\Http\Controllers\admin\BlogController::class, 'storeBlog'])->name('admin.blog.create');
Route::get('admin/blog/delete/{id}',[App\Http\Controllers\admin\BlogController::class, 'delete'])->name('admin.blog.delete');
Route::get('admin/blog/edit/{id}',[App\Http\Controllers\admin\BlogController::class,'edit'])->name('admin.blog.edit'); 
Route::post('admin/blog/update/{id}',[App\Http\Controllers\admin\BlogController::class,'update'])->name('admin.blog.update');   

Route::get('frontend/home',[App\Http\Controllers\frontend\HomeController::class,'index'])->name('frontend.home');
Route::get('member/register',[App\Http\Controllers\frontend\UserController::class,'registerIndex'])->name('member.register');
Route::post('member/register',[App\Http\Controllers\frontend\UserController::class,'registerPost'])->name('member.register.post');
Route::post('member/login',[App\Http\Controllers\frontend\UserController::class,'loginPost'])->name('member.login.post');
Route::get('member/login',[App\Http\Controllers\frontend\UserController::class,'loginIndex'])->name('member.login');
Route::post('member/logout', [App\Http\Controllers\frontend\UserController::class, 'logout'])->name('member.logout');

