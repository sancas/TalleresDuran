<?php

use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cars', function($table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('trabajo_id');
            $table->string('marca');
			$table->string('placa');
			$table->string('tarjetaCirculacion');
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
		Schema::drop('cars');
	}

}