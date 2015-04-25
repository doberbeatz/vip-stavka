<?php

namespace App\Users\Database;

use Illuminate\Support\Facades\Facade;

/**
 * Class UsersRepositoryFacade
 */
class UsersRepositoryFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'users_repository';
	}
} 