<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSetorsTable.
 */
class CreateSetorsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('setors', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->nullable();
            $table->integer('predio_id')->unsigned()->nullable();
            $table->foreign('predio_id')->references('id')->on('predios');
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
		Schema::drop('setors');
	}
}
