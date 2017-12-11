<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perguntas', function(Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->string('titulo');
            $tbl->integer('ordem')->default(0);
            $tbl->integer('status')->default(0);
            $tbl->integer('teste_id')->unsigned()->nullable();
            $tbl->string('imagem')->nullable();
            $tbl->timestamps();

            $tbl->foreign('teste_id')->on('testes')->references('id')->onDelete('set null');
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
