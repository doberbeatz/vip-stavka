<?php
namespace App\Users;

use App\Users\Database\UsersModel;
use App\Users\Database\UsersRepository;
use View, App;
use Illuminate\Support\ServiceProvider;

class UsersServiceProvider extends ServiceProvider {


	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		App::bind('users_repository', function(){
			return new UsersRepository(new UsersModel());
		});

		//Alias
		$loader = \Illuminate\Foundation\AliasLoader::getInstance();
		$loader->alias('Users', 'App\Users\Database\UsersRepositoryFacade');
	}

	public function boot()
	{
		View::addNamespace('users', __DIR__.'/views');

		require __DIR__."/routes.php";
		require __DIR__."/navigation.php";
	}
}