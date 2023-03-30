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
use App\Http\Controllers\CompanyController;



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

// Products
Route::post('/companyadd', [CompanyController::class, 'AddCompany']);
Route::post('/categoryadd', [ProductController::class, 'AddCategory']);

Route::post('/productadd', [ProductController::class, 'AddProduct']);
Route::post('/orderproduct', [ProductController::class, 'OrderNow']);
Route::get('/orderlistfetch', [ProductController::class, 'OrderListShow']);

//Email
Route::post('/emailsend', [EmailSendController::class, 'MailSend']);

// Distributor
Route::post('/distributorstore', [DistributorController::class, 'store']);
Route::get('/distributorlist', [DistributorController::class, 'show']);
Route::get('/distributoredit/{id}', [DistributorController::class, 'edit']);
Route::put('/distributorupdate', [DistributorController::class, 'update']);
Route::delete('/distributordelete/{id}', [DistributorController::class, 'delete']);

// Event
Route::post('/eventstore', [EventController::class, 'store']);
Route::get('/eventlist', [EventController::class, 'show']);
Route::get('/eventedit/{id}', [EventController::class, 'edit']);
Route::put('eventupdate', [EventController::class, 'update']);
Route::delete('/eventdelete/{id}', [EventController::class, 'delete']);

// News
Route::post('/newsstore', [NewsController::class, 'store']);
Route::get('/newslist', [NewsController::class, 'show']);
Route::get('/newsedit/{id}', [NewsController::class, 'edit']);
Route::put('/newsupdate', [NewsController::class, 'update']);
Route::delete('/newsdelete/{id}', [NewsController::class, 'delete']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
