<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateOrdemServsTable.
 */
class CreateOrdemServsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ordem_servs', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('solicit_id')->unsigned();
            $table->foreign('solicit_id')->references('id')->on('users');
            $table->integer('unid_id')->unsigned();
            $table->foreign('unid_id')->references('id')->on('unidades');
            $table->string('data');
            $table->string('hora');
            $table->text('descri');
            $table->boolean('priori')->default(0);
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->text('obs')->nullable();
            $table->integer('atend_id')->unsigned()->nullable();
            $table->foreign('atend_id')->references('id')->on('users');
            $table->smallInteger('status')->default(0);
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
		Schema::drop('ordem_servs');
	}
}
