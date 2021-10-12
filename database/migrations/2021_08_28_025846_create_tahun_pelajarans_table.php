<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahunPelajaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahun_pelajarans', function (Blueprint $table) {
            $table->id();
		    $table->string('tahun1', 4);
		    $table->string('tahun2', 20);
		
		    $table->unique('tahun1','tahun1');
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
        Schema::dropIfExists('tahun_pelajarans');
    }
}
