<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mailyonetim;
use Illuminate\Http\Request;
use App\Models\Musteriler;

class MusteriApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Musteriler::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Musteriler::create([
            'adsoyad' => $request->adsoyad,
            'mail' => $request->mail,
            'telefon' => $request->telefon,
        ]);
        return response()->json(['message'=>'Müşteri Kayıt Edildi.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $musteri = Musteriler::find($id)->first();
        return $musteri;
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
        $musteri = Musteriler::whereId($id)->update([
            'adsoyad' => $request->adsoyad,
            'mail' => $request->mail,
            'telefon' => $request->telefon,
        ]);
        return $musteri;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Musteriler::destroy($id);
        return response()->json(['message'=>'Silme Başarılı']);
    }
}
