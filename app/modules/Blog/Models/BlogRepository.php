<?php
namespace App\Blog\Models;


class BlogRepository {

	public function getAll()
	{
		return Blog::all();
	}

}