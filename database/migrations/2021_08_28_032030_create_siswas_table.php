<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->unique();
			$table->string('nisn', 20);
		    $table->string('keahlian', 20)->nullable();
		    $table->string('password')->nullable();
		    $table->string('nama', 50)->nullable();
		    $table->string('kelamin', 1)->nullable();
		    $table->string('tmp_lhr', 20)->nullable();
		    $table->date('tgl_lhr')->nullable();
		    $table->string('agama', 50)->nullable();
		    $table->string('alamat', 100)->nullable();
		    $table->string('kelurahan', 50)->nullable();
		    $table->string('kecamatan', 50)->nullable();
		    $table->string('kabupaten', 50)->nullable();
		    $table->string('kodepos', 5)->nullable();
		    $table->string('nohp', 20)->nullable();
		    $table->string('email', 50)->nullable();
		    $table->string('asal_sltp', 50)->nullable();
		    $table->string('alamat_sltp', 100)->nullable();
		    $table->string('thn_sttb', 20)->nullable();
		    $table->string('no_sttb', 20)->nullable();
		    $table->integer('thn_skhun')->nullable();
		    $table->string('no_skhun', 50)->nullable();
		    $table->string('diterima_kls', 20)->nullable();
		    $table->date('diterima_tgl')->nullable();
		    $table->string('nama_ayah', 50)->nullable();
		    $table->string('nama_ibu', 50)->nullable();
		    $table->string('alamat_ortu', 100)->nullable();
		    $table->string('kelurahan_ortu', 50)->nullable();
		    $table->string('kecamatan_ortu', 50)->nullable();
		    $table->string('kabupaten_ortu', 50)->nullable();
		    $table->string('kodepos_ortu', 5)->nullable();
		    $table->string('nohp_ortu', 20)->nullable();
		    $table->string('pekerjaan_ortu', 50)->nullable();
		    $table->string('nama_wali', 50)->nullable();
		    $table->string('alamat_wali', 100)->nullable();
		    $table->string('kelurahan_wali', 50)->nullable();
		    $table->string('kecamatan_wali', 50)->nullable();
		    $table->string('kabupaten_wali', 50)->nullable();
		    $table->string('kodepos_wali', 5)->nullable();
		    $table->string('nohp_wali', 20)->nullable();
		    $table->string('pekerjaan_wali', 50)->nullable();
		    $table->integer('akses')->default('0');
		    $table->integer('status');
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
        Schema::dropIfExists('siswas');
    }
}
