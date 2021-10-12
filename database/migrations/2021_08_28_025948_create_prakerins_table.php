<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrakerinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prakerins', function (Blueprint $table) {
            $table->id();
		    $table->string('induk', 10);
		    $table->string('ta');
		    $table->integer('semester');
		    $table->string('nama_tempat', 50);
		    $table->string('lokasi', 100);
		    $table->integer('lama');
		    $table->text('keterangan');
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
        Schema::dropIfExists('prakerins');
    }
}
