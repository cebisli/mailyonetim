<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
