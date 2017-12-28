<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigos', function(Blueprint $tbl) {
            $tbl->increments("id");
            $tbl->string('titulo');
            $tbl->string('resumo')->nullable();
            $tbl->text('conteudo');
            $tbl->integer('seo_id')->unsigned()->nullable();
            $tbl->string('url');
            $tbl->string('link_titulo', '100')->nullable();
            $tbl->datetime('publicacao')->default(DB::raw('NOW()'));
            $tbl->datetime('agendado')->default(DB::raw('NOW()'));
            $tbl->integer('user_id')->unsigned()->nullable();
            $tbl->integer('media_id')->nullable()->unsigned();
            $tbl->integer('status')->default(1);
            $tbl->timestamps();

            $tbl->foreign('user_id')->on('users')->references('id')->onDelete('set null');
            $tbl->foreign('seo_id')->on('seos')->references("id")->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('artigos');
    }
}
