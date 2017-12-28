<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function(Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->string('nome');
            $tbl->integer('media_id')->nullable()->unsigned();
            $tbl->string('link');
            $tbl->string("target");
            $tbl->string('titulo')->nullable();
            $tbl->string('subtitulo')->nullable();
            $tbl->string('botao_texto')->nullable();
            $tbl->string('botao_link')->nullable();
            $tbl->datetime('periodo_inicio')->default(DB::raw('NOW()'));
            $tbl->datetime('periodo_final');
            $tbl->integer('local_id')->unsigned()->nullable();
            $tbl->integer('indice')->default(0);
            $tbl->integer('status')->default(1);
            $tbl->timestamps();

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
        Schema::drop('banners');
    }
}
