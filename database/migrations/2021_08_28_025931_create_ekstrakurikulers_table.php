<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEkstrakurikulersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekstrakurikulers', function (Blueprint $table) {
            $table->id();
		    $table->string('induk', 50);
		    $table->integer('ta');
		    $table->integer('semester');
		    $table->integer('kode_ekskul');
		    $table->string('nilai', 2);
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
        Schema::dropIfExists('ekstrakurikulers');
    }
}
