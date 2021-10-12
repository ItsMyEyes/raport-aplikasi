<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cas', function (Blueprint $table) {
            $table->id();
            $table->string('induk');
            $table->string('ta');
            $table->string('semester');
            $table->string('sakit');
            $table->string('ijin');
            $table->string('alpa');
            $table->string('catatan');
            $table->string('sikap');
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
        Schema::dropIfExists('cas');
    }
}
