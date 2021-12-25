<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
		    $table->string('induk', 50);
            $table->string('type')->default('semester');
		    $table->integer('matpel');
		    $table->integer('ta');
		    $table->integer('semester');
		    $table->integer('p1');
		    $table->integer('p2');
		    $table->integer('p3');
		    $table->integer('k1');
		    $table->integer('k2');
		    $table->integer('k3');
		    $table->integer('s1')->nullable();
		    $table->integer('s2')->nullable();
		    $table->integer('s3')->nullable();
		    $table->integer('s4')->nullable();
		    $table->text('catatan')->nullable();
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
        Schema::dropIfExists('nilais');
    }
}
