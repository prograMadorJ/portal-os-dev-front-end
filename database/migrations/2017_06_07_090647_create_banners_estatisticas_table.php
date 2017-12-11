<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersEstatisticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners_estatisticas', function(Blueprint $tbl) {
            $tbl->increments("id");
            $tbl->integer('banner_id')->unsigned();
            $tbl->integer('tipos_estatistica_id')->unsigned();
            $tbl->string('cliente_ip','15')->nullable();
            $tbl->string('http_user_agent')->nullable();
            $tbl->timestamps();

            $tbl->foreign('banner_id')->on('banners')->references('id')->onDelete('cascade');
            $tbl->foreign('tipos_estatistica_id')->on('tipos_estatisticas')->references('id')->onDelete('cascade');
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
