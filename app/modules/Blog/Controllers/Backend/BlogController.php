<?php
namespace App\Blog\Controllers\Backend;

use App\Blog\Models\BlogRepository;
use View, Redirect, Session, Input, Request;
use \App\Blog\Grids\BlogGrid as Grid;
use \Doberbeatz\Laraback\Core\Controllers\ActionsController as BaseController;

class BlogController extends BaseController {

    protected $_model;

    public function __construct(BlogRepository $blogModel) {

        $this->_model = $blogModel;
    }

    /**
     * Список новостей
     *
     * @return Response
     */
    public function index()
    {
        $dbPosts = $this->_model;
        $data = $dbPosts->getAll();
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
        // Проверка данных
        if(!$this->_model->isValid(Input::all(), 'create')) {
            // Список ошибок
            Session::flash('danger', $this->_model->getErrors(true));

            return Redirect::back()->withInput()->withErrors($this->_model->getErrors());
        }

        // Добавление пользователя
        $model_name = $this->_model;
        $model_name::create(array(
            "header" => Input::get('header'),
            "brief" => Input::get('brief'),
            "description" => Hash::make(Input::get('description')),
            "is_active" => (Input::get('is_active')=='on')? 1 : 0,
            'author' => \BackendAuth::user()->backend_user_id
        ));

        // Статус добавления записи
        Session::flash('success', 'Пользователь успешно добавлен!');

        return Redirect::to(\route(Backend::getPathPrefix() . '.users.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $model_name = $this->_model;
        $post = $model_name::find($id);

        return View::make("backend::users.create")->with(array('post'=>$post));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

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
