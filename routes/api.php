<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmailSendController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\OrderController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::post('/login', [LoginController::class, 'Login']);
//Route::post('/logout', [LoginController::class, 'Logout']);
//Route::post('/userregister', [RegisterController::class, 'Register']);

// Login & Register
Route::post('/userauthentication', [LoginController::class, 'Login']);
Route::post('/userlogout', [LoginController::class, 'Logout']);
Route::post('/userregister', [RegisterController::class, 'Register']);

//Email
Route::post('/emailsend', [EmailSendController::class, 'MailSend']);

// Distributor
Route::post('/distributorstore', [DistributorController::class, 'store']);
Route::get('/distributorlist', [DistributorController::class, 'show']);
Route::post('/distributoredit', [DistributorController::class, 'edit']);
Route::post('/distributorupdate', [DistributorController::class, 'update']);
Route::post('/distributordelete', [DistributorController::class, 'delete']);

// Event
Route::post('/eventstore', [EventController::class, 'store']);
Route::get('/eventshow', [EventController::class, 'show']);
Route::post('/eventedit', [EventController::class, 'edit']);
Route::post('eventupdate', [EventController::class, 'update']);
Route::post('/eventdelete', [EventController::class, 'delete']);

// News
Route::post('/newsstore', [NewsController::class, 'store']);
Route::get('/newsshow', [NewsController::class, 'show']);
Route::post('/newsedit', [NewsController::class, 'edit']);
Route::post('/newsupdate', [NewsController::class, 'update']);
Route::post('/newsdelete', [NewsController::class, 'delete']);

// Category
Route::post('/categorystore', [CategoryController::class, 'store']);
Route::get('/categoryshow', [CategoryController::class, 'show']);
Route::post('/categoryedit', [CategoryController::class, 'edit']);
Route::post('/categoryupdate', [CategoryController::class, 'update']);
Route::post('/categorydelete', [CategoryController::class, 'delete']);

// Sub Category
Route::post('/subcategorystore', [SubCategoryController::class, 'store']);
Route::get('/subcategoryshow', [SubCategoryController::class, 'show']);
Route::post('/subcategoryedit', [SubCategoryController::class, 'edit']);
Route::post('/subcategoryupdate', [SubCategoryController::class, 'update']);
Route::post('/subcategorydelete', [SubCategoryController::class, 'delete']);

// Products
Route::post('/productstore', [ProductController::class, 'store']);
Route::get('/productshow', [ProductController::class, 'show']);
Route::post('/productedit', [ProductController::class, 'edit']);
Route::post('/productupdate', [ProductController::class, 'update']);
Route::post('/productdelete', [ProductController::class, 'delete']);
Route::post('/productcategorywiseshow', [ProductController::class, 'CategoryWiseShowProduct']);
Route::post('/productsubcategorywiseshow', [ProductController::class, 'SubCategoryWiseShowProduct']);
Route::post('/productsubcategorywisefilter', [ProductController::class, 'FilterProductSubCategoryWise']);
Route::post('/productsubcategorylist', [ProductController::class, 'SubCategoryList']);


// Order
Route::get('/orderlistfetch', [OrderController::class, 'show']);
Route::post('/orderproduct', [OrderController::class, 'OrderNow']);


// Contact Info
Route::get('/contactinfoshow', [ContactInfoController::class, 'show']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
