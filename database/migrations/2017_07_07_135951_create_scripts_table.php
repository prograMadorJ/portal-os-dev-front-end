<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScriptsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('scripts', function(Blueprint $table) {
      $table->increments('id');
      $table->string('name', '100');
      $table->text('code');
      $table->integer("status")->default(0);
      $table->integer('local_id')->unsigned()->nullable();
      $table->integer('in_top')->default(0);
      $table->timestamps();

      $table->foreign('local_id')->references('id')->on('local')->onDelete("restrict");
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::drop('scripts');
  }
}
