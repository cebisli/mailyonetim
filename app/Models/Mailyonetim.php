<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mailyonetim extends Model
{
    use HasFactory;

    protected $table = 'mailyonetim';
    protected $fillable= ['baslik','metin','kisi_id'];

    public function musteri(){
        return $this->hasMany(Musteriler::class, 'id','kisi_id');
    }
}
