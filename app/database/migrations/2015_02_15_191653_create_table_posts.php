<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('post_id');
			$table->string('header', 50);
			$table->text('brief');
			$table->text('content');
			$table->integer('image');
			$table->tinyInteger('is_visible')->default(1);
			$table->integer('author');
			$table->integer('category');
			// SEO
			$table->text('meta_title', 50);
			$table->text('meta_keywords');
			$table->text('meta_description');

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
		Schema::drop('posts');
	}

}
