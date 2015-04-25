<?php
namespace App\Users\Controllers\Backend;

use Users, FlashMessenger;
use View, Redirect, Session, Input, Request;
use Intervention\Image\Facades\Image;
use App\Users\Grids\UsersGrid as Grid;
use App\Users\Database\UsersModel as Model;
use Doberbeatz\Laraback\Core\Controllers\ActionsController as BaseController;

class UsersController extends BaseController {

	/**
	 * @param Model $model
	 */
	public function __construct(Model $model)
	{
		parent::__construct($model);
	}

	/**
	 * Список новостей
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Users::getAll();
		$grid = new Grid('users', $data);

		return View::make("users::backend.index", array("grid" => $grid));
	}

	/**
	 * Просмотр формы создания новости
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("users::backend.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = Input::all();
		$inputs['author'] = \BackendAuth::user()->getKey();

		if (Input::hasFile('image'))
		{
			$file = Input::file('image');

			if (!is_dir(public_path('images'))) {
				mkdir(public_path('images'), 0777, true);
			}

			$name = time().'_'.$file->getClientOriginalName();
			$pathToFile = public_path('images/'.$name);

			Image::make($file->getRealPath())
						->save($pathToFile);

			$inputs['image'] = $name;
		}

		$post = Users::newModelInstance($inputs);

		if ($post->save())
		{
			FlashMessenger::addSuccess('Статья сохранена');
		} else
		{
			FlashMessenger::addMessages('danger', $post->getErrors()->all());
		}

		if ($post->getKey())
		{
			return Redirect::to(\Route(\Backend::getPathPrefix() . '.backend_users.edit', ['users' => $post->getKey()]));
		} else
		{
			return Redirect::back();
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Users::getById($id);

		return View::make("users::backend.create")->with(array('post' => $post));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		$post = Users::getById($id);

		$inputs = Input::all();

		if (Input::hasFile('image'))
		{
			$file = Input::file('image');

			if (!is_dir(public_path('images'))) {
				mkdir(public_path('images'), 0777, true);
			}

			$name = time().'_'.$file->getClientOriginalName();
			$pathToFile = public_path('images/'.$name);

			Image::make($file->getRealPath())
				->save($pathToFile);

			$inputs['image'] = $name;
		}

		$post->fill($inputs);

		if ($post->save())
		{
			FlashMessenger::addSuccess('Статья успешно сохранена');
		} else
		{
			FlashMessenger::addMessages('danger', $post->getErrors()->all());
		}

		return Redirect::to(\Route(\Backend::getPathPrefix() . '.backend_users.edit', ['users' => $post->getKey()]));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Users::getById($id);
		FlashMessenger::addSuccess('Статья "'.$post->name.'" успешно удалена');

		$post->delete();

		return Redirect::back();
	}

	/**
	 *
	 */
	public function show()
	{

	}
}