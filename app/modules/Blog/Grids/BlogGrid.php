<?php
namespace App\Blog\Grids;

use \Doberbeatz\Laraback\Grid\Grid as Grid;

class BlogGrid extends Grid {

	public function init() {
		// Оформление
		$this->setClass('primary');

		// Общие данные
		$this->addColumn("header", "text", array("label"=>"Заголовок"));

		$this->addAction("add", array(
				"icon"=>"plus",
				"link"=>array("route"=>\Backend::getPathPrefix() . '.blog.create'),
				'label'=>'Добавить статью')
		);
	}
}