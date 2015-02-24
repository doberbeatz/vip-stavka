<?php
namespace App\Blog;

use App\Blog\Database\BlogModel;
use App\Blog\Database\BlogRepository;
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
		App::bind('blog_repository', function(){
			return new BlogRepository(new BlogModel());
		});

		//Alias
		$loader = \Illuminate\Foundation\AliasLoader::getInstance();
		$loader->alias('Blog', 'App\Blog\Database\BlogRepositoryFacade');
	}

	public function boot()
	{
		View::addNamespace('blog', __DIR__.'/views');

		require __DIR__."/routes.php";
		require __DIR__."/navigation.php";
	}
}