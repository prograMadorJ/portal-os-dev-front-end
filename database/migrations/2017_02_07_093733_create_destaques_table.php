<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestaquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destaques', function(Blueprint $tbl) {
            $tbl->increments("id");
            $tbl->integer('indice');
            $tbl->integer('artigo_id')->unsigned();
            $tbl->datetime('agendado')->default(DB::raw('NOW()'));
            $tbl->integer('status')->default(1);
            $tbl->timestamps();

            $tbl->foreign('artigo_id')->on("artigos")->references('id')->onDelete('cascade');
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
