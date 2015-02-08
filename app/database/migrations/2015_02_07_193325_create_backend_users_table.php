<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBackendUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('backend_users', function(Blueprint $table)
		{
			$table->increments('backend_user_id');
			$table->string('login')->unique;
			$table->string('name');
			$table->string('email')->unique;
			$table->string('password', 60);
			$table->tinyInteger('is_active')->default(1);
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('backend_users');
	}

}
