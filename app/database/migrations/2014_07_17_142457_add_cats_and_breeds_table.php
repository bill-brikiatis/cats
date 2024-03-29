<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCatsAndBreedsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    // create 'cats' and 'breeds' tables
    Schema::create('cats', function($table) {
      $table->increments('id');
      $table->string('name');
      $table->date('date_of_birth');
      $table->integer('breed_id')->nullable();
      $table->timestamps();
    });
    Schema::create('breeds', function($table) {
      $table->increments('id');
      $table->string('name');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    //drop 'cats' and 'breeds' tables
    Schema::drop('cats');
    Schema::drop('breeds');
  }

}
