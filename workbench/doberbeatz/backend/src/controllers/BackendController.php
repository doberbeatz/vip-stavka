<?php
namespace Doberbeatz\Backend;

use Illuminate\Routing\Controller;
use View;

class BackendController extends Controller {

	public function index()
	{
		return View::make('backend::index');
	}

}
