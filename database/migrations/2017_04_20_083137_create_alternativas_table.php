<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlternativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternativas', function(Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->string('titulo');
            $tbl->text('observacoes')->nullable();
            $tbl->integer('verdadeira')->default(0);
            $tbl->integer('peso')->default(0);
            $tbl->integer('ordem')->default(0);
            $tbl->integer('status')->default(0);
            $tbl->integer('pergunta_id')->unsigned()->nullable();
            $tbl->timestamps();

            $tbl->foreign('pergunta_id')->on('perguntas')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('alternativas');
    }
}
