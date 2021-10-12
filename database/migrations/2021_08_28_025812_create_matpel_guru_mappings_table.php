<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatpelGuruMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matpel_guru_mappings', function (Blueprint $table) {
            $table->id();
			$table->string('id_guru', 50);
			$table->integer('id_matpel');	
			$table->integer('ta');
			$table->integer('semester');
		    $table->integer('kb_peng');
			$table->integer('kb_ket');
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
        Schema::dropIfExists('matpel_guru_mappings');
    }
}
