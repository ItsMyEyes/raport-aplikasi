<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatpelKelasMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matpel_kelas_mappings', function (Blueprint $table) {
            $table->id();
		    $table->integer('kelas');
		    $table->integer('semester');
		    $table->string('kompetensi', 50);
		    $table->integer('id_matpel');
		    $table->integer('no_urut');
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
        Schema::dropIfExists('matpel_kelas_mappings');
    }
}
