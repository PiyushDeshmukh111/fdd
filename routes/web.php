<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Home;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\AssociateAuth;
use App\CustomClasses\ColectionPaginate;





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
Route::any('admin/login',[Admin::class,'index']);
Route::any('/forgot-password',[Home::class,'forgotPassword']);
// Route::any('Admin/dashboard',[Admin::class,'dashboard']);
Route::any('/login',[Home::class,'login']);
Route::any('/logout',[Home::class,'logout']);
Route::any('Home/checkDetails',[Home::class,'checkDetails']);


Route::group(['middleware' => ['AdminAuth']], function (){
Route::any('Home/registration',[Home::class,'registration']);
Route::any('/register',[Home::class,'register']);
Route::any('productList',[Home::class,'productList']);
Route::any('createProduct',[Admin::class,'createProduct']);
Route::any('saveProduct',[Home::class,'saveProduct']);
Route::get('editProduct/{id}', [Home::class,'editProduct']);
Route::put('updateproductList/{id}',[Home::class,'updateproductList']);
Route::any('deleteproducts/{id}',[Home::class,'deleteproducts']);
Route::get('user', [UserController::class, 'getData']);
});



Route::get('/generate-barcode', [ProductController::class, 'index'])->name('generate.barcode');

// Route::any('Admin/barcode',[Admin::class,'generateBarcode']);







Route::group(['middleware' => ['AdminAuth']], function (){
Route::any('Admin/dashboard',[Admin::class,'dashboard']);

});

Route::group(['middleware' => ['AssociateAuth']], function (){
Route::any('Associate/dashboard',[Admin::class,'Associatedashboard']);
});




