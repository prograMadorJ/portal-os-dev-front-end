<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function(Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->string('arquivo');
            $tbl->string('titulo')->nullable();
            $tbl->string('descricao')->nullable();
            $tbl->integer('tipo_media_id')->unsigned()->nullable();
            $tbl->integer('tamanho_arquivo')->nullable();
            $tbl->integer('status')->default(1);
            $tbl->timestamps();
        });

        Schema::table('artigos', function(Blueprint $tbl) {
            $tbl->foreign('media_id')->references('id')->on('media')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('media');
    }
}
