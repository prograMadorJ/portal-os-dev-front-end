<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricosContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos_contatos', function(Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->text('mensagem');
            $tbl->integer('user_id')->unsigned();
            $tbl->integer('from_id')->unsigned();
            $tbl->string('from_model');
            $tbl->integer('cadastro_id')->unsigned();
            $tbl->timestamps();

            $tbl->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $tbl->foreign('cadastro_id')->references('id')->on('cadastros')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
