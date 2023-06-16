<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteriler;

class YonetimController extends Controller
{
    public function index()
    {
        return view('include.home');
    }

    public function MusteriEkle()
    {
        return view('include.musteri-ekle');
    }

    public function MusteriEklePost(Request $request)
    {
        $request->validate([
            'adsoyad'=>'required',
            'mail'=>'required|email:rfc,dns'
            ]);
        Musteriler::create([
            'adsoyad' => $request->adsoyad,
            'mail' => $request->mail,
            'telefon' => $request->telefon,
        ]);

        return redirect()->route('yeni_musteri')->with('success','Müsteri Başarıyla eklendi...');
    }
}
