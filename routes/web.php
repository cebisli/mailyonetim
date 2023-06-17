<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YonetimController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/index', [YonetimController::class, 'index'])->name('index');
Route::get('/musteri-ekle', [YonetimController::class, 'MusteriEkle'])->name('yeni_musteri');
Route::post('/musteri-ekle-post', [YonetimController::class, 'MusteriEklePost'])->name('yeni_musteri_post');
Route::get('/musteri-listesi', [YonetimController::class, 'MusteriListe'])->name('musteri_listesi');
