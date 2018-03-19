<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePrediosTable.
 */
class CreatePrediosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('predios', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->text('localiz')->nullable();
            $table->integer('empre_id')->unsigned();
            $table->foreign('empre_id')->references('id')->on('empres');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('predios');
	}
}
