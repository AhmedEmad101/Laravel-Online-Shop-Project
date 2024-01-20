<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\AdminController;
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
Route::view('SignUp','SignUp');
Route::view('Login','Login');
Route::view('Profile','Profile');
Route::view('VendorProfile','VendorProfile');
Route::post('SaveData',[UserController::class,'SaveUserData']);
Route::post('Login',[UserController::class,'CheckValidUser']);
Route::post('AddProduct',[VendorController::class,'AddProduct']);
Route::get('DeleteProduct/{id}',[VendorController::class,'DeleteProduct']);
Route::get('ListProducts',[VendorController::class,'ListProducts']);
Route::get('ShowResults',[UserController::class,'Search']);
Route::post('ShowResults',[UserController::class,'Search']);
Route::get('AddToChart/{ProductId}',[UserController::class,'AddToChart']);
Route::post('AddToChart/{ProductId}',[UserController::class,'AddToChart']);
Route::post('ShowChartItems',[UserController::class,'ShowChartItems']);
Route::get('ShowUserRequests',[VendorController::class,'ShowUserRequests']);
Route::get('AdminPage',[AdminController::class,'ShowUsers']);
Route::post('AddPrivillage',[AdminController::class,'AddPrivillage']);
Route::view('PwdUpdate','PwdUpdate');
Route::get('UpdatePassword',[UserController::class,'UpdatePassword']);
Route::get('ViewCategories',[AdminController::class,'ViewCategories']);
Route::get('AddCategory',[AdminController::class,'AddCategory']);
Route::get('ProductApprovement/{ProductId}',[VendorController::class,'ProductApprovement']);
