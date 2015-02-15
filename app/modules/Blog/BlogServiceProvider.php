<?php
namespace App\Blog;

use View, App;
use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider {


	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	public function boot()
	{

		View::addNamespace('blog', __DIR__.'/views');

		require __DIR__."/routes.php";
		require __DIR__."/navigation.php";
	}
}