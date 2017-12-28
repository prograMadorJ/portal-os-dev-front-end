<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_media', function(Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->string('descricao', '100');
            $tbl->integer('status')->default(0);
            $tbl->timestamps();
        });

        Schema::table('media', function(Blueprint $tbl) {
            $tbl->foreign('tipo_media_id')->on('tipo_media')->references('id')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tipo_media');
    }
}
