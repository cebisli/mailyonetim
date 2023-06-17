<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mailyonetim;
use App\Models\Musteriler;
use Mail;

class MailController extends Controller
{
    public function index()
    {
        $musteriler = Musteriler::all();
        return view('include.mail-olustur', compact('musteriler'));
    }

    public function MailEklePost(Request $request)
    {
        $request->validate([
            'baslik'=>'required',
            'metin'=>'required'
            ]);

        Mailyonetim::create([
            "baslik"=>$request->baslik,
            "metin"=>$request->metin,
            "kisi_id"=>$request->musteri_id
        ]);

        $musteri = Musteriler::whereId($request->musteri_id)->first();

        $array = [
            'name'=>$musteri->adsoyad,
            'email'=>$musteri->mail,
            'telefon'=>$musteri->telefon,
            'mesaj'=>$request->metin
        ];

        mail::send('include.sablon', $array, function ($message) use ($musteri) {
            $message->from($musteri->mail, 'Mail gönderme');
            $message->subject("İLETİŞİM FORMU");
            $message->to($musteri->mail);
        });

        return redirect()->route('toplu_mail_olusturma')->with('success','mail tanımlama işlemi başarılı');
    }

    public function MailListe()
    {
        $gonderileMailler = Mailyonetim::with('musteri')->get();

        return view('include.mail_listesi', compact('gonderileMailler'));
    }
}
