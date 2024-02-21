<?php

use App\Http\Controllers\Datable1Controller;
use App\Http\Controllers\PostmanTestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/export-to-excel', [Datable1Controller::class,'exportUsers']);
Route::get('/postman', [PostmanTestController::class,'index']);
Route::get('/getUpdateAt', [Datable1Controller::class,'getUpdateAt'])->name('getUpdateAt');
Route::get('/getdatabale', [Datable1Controller::class,'getDatable']);
Route::get('/getdata_view', [Datable1Controller::class,'index']);
Route::get('/getsupplier',[Datable1Controller::class,'getSupplier'])->name('getsupplier');