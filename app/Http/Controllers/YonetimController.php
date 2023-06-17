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

        return redirect()->route('musteri_listesi')->with('success','Müsteri Başarıyla eklendi...');
    }

    public function MusteriDuzenle($id)
    {
        $musteri = Musteriler::whereId($id)->first();
        if ($musteri)
            return view('include.musteri-duzenle', compact('musteri'));
        else
            return redirect()->route('musteri_listesi');    
    }

    public function MusteriDuzenlePost(Request $request, $id)
    {
        $request->validate([
            'adsoyad'=>'required',
            'mail'=>'required|email:rfc,dns'
            ]);
        
        Musteriler::whereId($id)->update([
                'adsoyad' => $request->adsoyad,
                'mail' => $request->mail,
                'telefon' => $request->telefon,
            ]);    

        return redirect()->route('musteri_listesi')->with('success','Müsteri Başarıyla güncellendi...');
    }

    public function MusteriSil($id)
    {
        $musteri = Musteriler::whereId($id)->first();
        if ($musteri)
            Musteriler::whereId($id)->delete();
        
        return redirect()->route('musteri_listesi')->with('success','Müsteri Başarıyla silindi...');    
    }

    public function MusteriListe()
    {
        $musteriler = Musteriler::all();
        return view('include.musteri-list',compact('musteriler'));
    }
}
