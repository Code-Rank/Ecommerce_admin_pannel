<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\login;
use App\Http\Controllers\GuestadminController;
use App\Http\Controllers\Controllercategory ;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\sizecontroller;
use App\Http\Controllers\colorcontroller;
use App\Http\Controllers\brandcontroller;
use App\Http\Controllers\productcontroller;
/*
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//this route is used for show layout 
Route::get('admin/layout/layout',[login::class,'show']);
//these routes are used for admin login and logout
Route::post('admin/signin',[login::class,'signin']);
Route::get('admin/login',[login::class,'login']);
Route::get('admin/logout',[login::class,'logout']);
//these routes are used for admin registeration
Route::get('admin/addadmin',[login::class,'addadmin']);
Route::post('admin/signup',[login::class,'signup']);
Route::get('admin/guestadmin',[GuestadminController::class,'index']);
//these routes are used for category
Route::get('admin/category_table',[Controllercategory::class,'show_table']);
Route::get('admin/add_category',[Controllercategory::class,'show_form']);
Route::post('admin/insert_category',[Controllercategory::class,'insert_category']);
Route::get('admin/delete_category/{slug}',[Controllercategory::class,'delete_category']);
Route::get('admin/update_category/{slug}',[Controllercategory::class,'update_form']);
Route::post('admin/insert_update_category/{slug}',[Controllercategory::class,'insert_update_category']);
Route::get('admin/category_status/{status}/{id}',[Controllercategory::class,'update_status']);
//these routes are used for cupon
Route::get('admin/cupon_table',[CuponController::class,'show_table']);
Route::get('admin/add_cupon',[CuponController::class,'show_form']);
Route::post('admin/insert_cupon',[CuponController::class,'insert_cupon']);
Route::get('admin/delete_cupon/{code}',[CuponController::class,'delete_cupon']);
Route::get('admin/update_cupon/{code}',[CuponController::class,'update_form']);
Route::post('admin/insert_update_cupon/{code}',[CuponController::class,'insert_update_cupon']);
Route::get('admin/status/{status}/{id}',[CuponController::class,'update_status']);

//these routes are used for size
Route::get('admin/size_table',[sizecontroller::class,'show_table']);
Route::get('admin/add_size',[sizecontroller::class,'show_form']);
Route::post('admin/insert_size',[sizecontroller::class,'insert_size']);
Route::get('admin/delete_size/{code}',[sizecontroller::class,'delete_size']);
Route::get('admin/update_size/{code}',[sizecontroller::class,'update_form']);
Route::post('admin/insert_update_size/{id}',[sizecontroller::class,'insert_update_size']);
Route::get('admin/size_status/{status}/{id}',[sizecontroller::class,'update_status']);

//these routes are used for color
Route::get('admin/color_table',[colorcontroller::class,'show_table']);
Route::get('admin/add_color',[colorcontroller::class,'show_form']);
Route::post('admin/insert_color',[colorcontroller::class,'insert_color']);
Route::get('admin/delete_color/{code}',[colorcontroller::class,'delete_color']);
Route::get('admin/update_color/{code}',[colorcontroller::class,'update_form']);
Route::post('admin/insert_update_color/{id}',[colorcontroller::class,'insert_update_color']);
Route::get('admin/color_status/{status}/{id}',[colorcontroller::class,'update_status']);

//these routes are used for brands
Route::get('admin/brand_table',[brandcontroller::class,'show_table']);
Route::get('admin/add_brand',[brandcontroller::class,'show_form']);
Route::post('admin/insert_brand',[brandcontroller::class,'insert_brand']);
Route::get('admin/delete_brand/{code}',[brandcontroller::class,'delete_brand']);
Route::get('admin/update_brand/{code}',[brandcontroller::class,'update_form']);
Route::post('admin/insert_update_brand/{id}',[brandcontroller::class,'insert_update_brand']);
Route::get('admin/brand_status/{status}/{id}',[brandcontroller::class,'update_status']);

//these routes are used for product
Route::get('admin/product_table',[productcontroller::class,'show_table']);
Route::get('admin/add_product',[productcontroller::class,'show_form']);
Route::post('admin/insert_product',[productcontroller::class,'insert_product']);
Route::get('admin/delete_product/{code}',[productcontroller::class,'delete_product']);
Route::get('admin/update_product/{code}',[productcontroller::class,'update_form']);
Route::post('admin/insert_update_product/{id}',[productcontroller::class,'insert_update_product']);
Route::get('admin/product_status/{status}/{id}',[productcontroller::class,'update_status']);

Route::get('admin/delete_attribute/{aid}/{pid}',[productcontroller::class,'delete_product_attribute']);
Route::get('admin/delete_image/{Iid}/{pid}',[productcontroller::class,'delete_product_image']);