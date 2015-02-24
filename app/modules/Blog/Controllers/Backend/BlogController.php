<?php
namespace App\Blog\Controllers\Backend;

use Blog, FlashMessenger;
use View, Redirect, Session, Input, Request;
use Intervention\Image\Facades\Image;
use App\Blog\Grids\BlogGrid as Grid;
use Doberbeatz\Laraback\Core\Controllers\ActionsController as BaseController;

class BlogController extends BaseController {

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
        $pathToFile = public_path('images/blog/'.time().'_'.Input::file('image')->getClientOriginalName());

        Image::make(Input::file('image')->getRealPath())
                    ->save($pathToFile);
        
        echo '<hr><pre>';print_r($pathToFile);echo '</pre><hr>';exit;

        $post = Blog::newModelInstance($inputs);

        if($post->save()){
            FlashMessenger::addSuccess('Статья сохранена');
        }else{
            FlashMessenger::addMessages('danger', $post->getErrors()->all());
        }

        if($post->getKey())
        {
            return Redirect::to(\Route(\Backend::getPathPrefix().'.blog.edit', ['blog'=>$post->getKey()]));
        }else{
            return Redirect::back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = Blog::getById($id);

        return View::make("blog::backend.create")->with(array('post'=>$post));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $post = Blog::getById($id);
        $post->fill(Input::all());

        if($post->save()){
            FlashMessenger::addSuccess('Статья успешно сохранена');
        }else{
            FlashMessenger::addMessages('danger', $post->getErrors()->all());
        }

        return Redirect::to(\Route(\Backend::getPathPrefix().'.blog.edit',['blog'=>$post->getKey()]));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {   

    }
}
