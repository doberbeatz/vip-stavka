<?php
namespace App\Blog\Grids;

use \Doberbeatz\Laraback\Grid\Grid as Grid;

class BlogGrid extends Grid {

	public function init() {
		// Оформление
		$this->setClass('primary');

		// Общие данные
		$this->addColumn("header", "text", array("label"=>"Заголовок"));

		$this->addColumn('is_visible', "ajaxToggler",
			[
				"label" => "Показывать",
				"action" =>
					[
						"route" => \Backend::getPathPrefix() . ".blog.ajaxUpdate",
						"params" => array(
							"id" => "{post_id}",
						)
					]
			]
		);

		$this->addColumn(
			'edit',
			'icon',
			[
				'icon' => 'edit',
				'link' => [
					'route' => \Backend::getPathPrefix() . '.blog.edit',
					'params' => [
						'id' => '{post_id}'
					]
				]
			]
		);

		$this->addColumn("delete", "icon", array("icon"=>"times", "method"=>"delete", "class"=>"js-confirm", "link"=>array(
			"route"=> \Backend::getPathPrefix() . ".blog.destroy",
			"params"=>array("id"=>"{post_id}")
		)));

		$this->addAction("add", array(
				"icon"=>"plus",
				"link"=>array("route"=>\Backend::getPathPrefix() . '.blog.create'),
				'label'=>'Добавить статью')
		);
	}
}