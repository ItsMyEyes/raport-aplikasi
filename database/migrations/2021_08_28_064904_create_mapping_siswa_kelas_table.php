<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMappingSiswaKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapping_siswa_kelas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_siswa');
		    $table->integer('id_kelas');
		    $table->integer('semester');
		    $table->integer('absen');
			$table->string('ta',255);
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
        Schema::dropIfExists('mapping_siswa_kelas');
    }
}
