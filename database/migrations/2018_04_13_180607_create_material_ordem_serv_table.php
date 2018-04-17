<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialOrdemServTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_ordem_serv', function (Blueprint $table) {
            $table->integer('material_id')->unsigned();
            $table->foreign('material_id')->references('id')->on('materials');
            $table->integer('ordem_serv_id')->unsigned();
            $table->foreign('ordem_serv_id')->references('id')->on('ordem_servs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_ordem_serv');
    }
}
