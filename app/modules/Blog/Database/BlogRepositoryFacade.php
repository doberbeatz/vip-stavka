<?php

namespace App\Blog\Database;

use Illuminate\Support\Facades\Facade;

/**
 * Class BlogRepositoryFacade
 */
class BlogRepositoryFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'blog_repository';
	}
} 