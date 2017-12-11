<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seos', function(Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->string('meta_titulo', '76');
            $tbl->string('meta_descricao', '154');
            $tbl->string('fb_titulo', '80')->nullable();
            $tbl->string('fb_descricao')->nullable();
            $tbl->string('fb_imagem')->nullable();
            $tbl->string("tw_titulo", '100')->nullable();
            $tbl->string('tw_descricao')->nullable();
            $tbl->string('tw_imagem')->nullable();
            $tbl->string('tweet', '144')->nullable();
            $tbl->string("gp_titulo", '60')->nullable();
            $tbl->string('gp_descricao')->nullable();
            $tbl->string('gp_imagem')->nullable();
            $tbl->integer('status')->default(1);
            $tbl->timestamps();
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
