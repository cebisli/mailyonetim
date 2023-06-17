<?php

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

Route::controller(\App\Http\Controllers\Api\MusteriApiController::class)->group(function(){
    Route::get('/musteriler', 'index');
    Route::post('/musteriler', 'store');
    Route::get('/musteriler/{id}', 'show');
    Route::put('/musteriler/{id}', 'update');
    Route::delete('/musteriler/{id}', 'delete');
});

Route::controller(\App\Http\Controllers\Api\MailApiController::class)->group(function(){
    Route::get('/mailler', 'index');
    Route::post('/mailler', 'store');
    Route::get('/mailler/{id}', 'show');
    Route::put('/mailler/{id}', 'update');
    Route::delete('/mailler/{id}', 'delete');
});
