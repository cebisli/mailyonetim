<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YonetimController;
use App\Http\Controllers\MailController;

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

Route::get('/musteri-duzenle/{id}', [YonetimController::class, 'MusteriDuzenle'])->name('musteri_duzenle');
Route::post('/musteri-duzenle-post/{id}', [YonetimController::class, 'MusteriDuzenlePost'])->name('musteri_duzenle_post');
Route::get('/musteri-sil/{id}', [YonetimController::class, 'MusteriSil'])->name('musteri_sil');


Route::get('/toplu-mail-olustur', [MailController::class, 'index'])->name('toplu_mail_olusturma');
Route::post('/mail-olustur-post', [MailController::class, 'MailEklePost'])->name('mail_olustur_post');

Route::get('/mail_listesi', [MailController::class, 'MailListe'])->name('mail_listesi');
