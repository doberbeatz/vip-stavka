<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( !Schema::hasTable('settings') )
		{
			Schema::create('settings', function (Blueprint $table)
			{
				$table->increments('setting_id');
				$table->string('key', 255);
				$table->unique('key');
				$table->string('label', 255);
				$table->string('value', 255);

				$table->timestamps();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('settings');
	}

}
