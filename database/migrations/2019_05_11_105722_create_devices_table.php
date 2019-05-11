<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDevicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('devices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable();
			$table->text('address', 65535)->nullable();
			$table->string('manufacturer')->nullable();
			$table->string('device')->nullable();
			$table->string('chip_id')->nullable()->unique('chip_id');
			$table->string('wifi_mac')->nullable()->unique('wifi_mac');
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
		Schema::drop('devices');
	}

}
