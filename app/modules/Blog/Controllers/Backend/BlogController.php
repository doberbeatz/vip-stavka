<?php
namespace App\Blog\Controllers\Backend;

use Blog, FlashMessenger;
use View, Redirect, Session, Input, Request;
use Intervention\Image\Facades\Image;
use App\Blog\Grids\BlogGrid as Grid;
use App\Blog\Database\BlogModel as Model;
use Doberbeatz\Laraback\Core\Controllers\ActionsController as BaseController;

class BlogController extends BaseController {

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
		$data = Blog::getAll();
		$grid = new Grid('blog', $data);

		return View::make("blog::backend.index", array("grid" => $grid));
	}

	/**
	 * Просмотр формы создания новости
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("blog::backend.create");
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

		$post = Blog::newModelInstance($inputs);

		if ($post->save())
		{
			FlashMessenger::addSuccess('Статья сохранена');
		} else
		{
			FlashMessenger::addMessages('danger', $post->getErrors()->all());
		}

		if ($post->getKey())
		{
			return Redirect::to(\Route(\Backend::getPathPrefix() . '.blog.edit', ['blog' => $post->getKey()]));
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
		$post = Blog::getById($id);

		return View::make("blog::backend.create")->with(array('post' => $post));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		$post = Blog::getById($id);

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

		return Redirect::to(\Route(\Backend::getPathPrefix() . '.blog.edit', ['blog' => $post->getKey()]));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Blog::getById($id);
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