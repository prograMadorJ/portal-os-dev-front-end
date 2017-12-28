<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaDerivativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_derivatives', function(Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->integer('media_id')->unsigned();
            $tbl->integer('media_parent_id')->unsigned();
            $tbl->enum('screen', array('xs', 'sm', 'md', 'lg', 'xl'));
            $tbl->enum('size', array('min', 'max'))->default('max');
            $tbl->timestamps();

            $tbl->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
            $tbl->foreign('media_parent_id')->references('id')->on('media')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('media_derivatives');
    }
}
