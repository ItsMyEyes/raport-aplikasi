<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatpelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matpels', function (Blueprint $table) {
            $table->id();
		    $table->string('kelompok', 2);
			$table->string('nama', 100);
			$table->string('kompetensi');
			$table->integer('semester');
			$table->string('kelas_ajar');
		    $table->text('desc_peng');
		    $table->text('desc_ket')->nullable();
		    $table->text('desc_sos')->nullable();
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
        Schema::dropIfExists('matpels');
    }
}
