<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mailyonetim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailyonetim', function (Blueprint $table) {
            $table->id();
            $table->string('baslik');
            $table->longText('metin');
            $table->unsignedBigInteger('kisi_id');

            $table->foreign('kisi_id')->references('id')->on('musteriler')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailyonetim');
    }
}
