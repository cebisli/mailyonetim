<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mailyonetim;
use App\Models\Musteriler;

class MailApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Mailyonetim::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mailyonetim::create([
            "baslik"=>$request->baslik,
            "metin"=>$request->metin,
            "kisi_id"=>$request->musteri_id
        ]);
        return response()->json(['message'=>'Mail Gönderildi.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mail = Mailyonetim::find($id)->first();
        return $mail;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mail = Mailyonetim::whereId($id)->updated([
            "baslik"=>$request->baslik,
            "metin"=>$request->metin,
            "kisi_id"=>$request->musteri_id
        ]);
        return $mail;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mail = Mailyonetim::destroy($id);
        return response()->json(['message'=>'Silme Başarılı']);
    }
}
