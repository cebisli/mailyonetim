<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mailyonetim;

class MailController extends Controller
{
    public function index()
    {
        return view('include.mail-olustur');
    }

    public function MailEklePost(Request $request)
    {
        $request->validate([
            'baslik'=>'required',
            'metin'=>'required',
            'tema'=>'required'
            ]);
        
        Mailyonetim::create([
            "baslik"=>$request->baslik,
            "metin"=>$request->metin,
            "tema"=>$request->tema
        ]);    


        return redirect()->route('toplu_mail_olusturma')->with('success','mail tanımlama işlemi başarılı');
    }
}
