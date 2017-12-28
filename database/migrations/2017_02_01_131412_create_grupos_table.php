<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->string('nome', '100');
            $tbl->integer('status')->default('1');
            $tbl->timestamps();
        });

        Schema::table('users', function(Blueprint $tbl) {
            $tbl->foreign('grupo_id')->on('grupos')->references('id')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grupos');
    }
}
