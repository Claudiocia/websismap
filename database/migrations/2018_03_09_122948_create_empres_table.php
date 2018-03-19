<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateEmpresTable.
 */
class CreateEmpresTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empres', function(Blueprint $table) {
            $table->increments('id');
			$table->string('nome');
			$table->string('fantasia')->nullable();
            $table->string('cnpj')->unique();
            $table->string('email');
            $table->string('tel');
            $table->string('site');
            $table->string('end');
            $table->string('num');
            $table->string('bairro');
            $table->string('cep');
            $table->string('cidade');
            $table->string('uf');
            $table->string('und_princ');
            $table->string('und_sub1');
            $table->string('und_sub2');
            $table->string('und_sub3');
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
		Schema::drop('empres');
	}
}
