@extends('backend::layouts.default')

@section('title')
	@if(!isset($post)||$post===null||$post===false)
		Блог: добавление
		<?php $imgValue = null;?>
	@else
		Блог: редактирование статьи {{ $post->getName() }}
		<?php $imgValue = $post->getImage();?>
	@endif
@stop

@section('content')

	{{-- Форма статьи --}}
	<div class="row">
		<div class="col-lg-7">

			@if(!isset($post))
				{{ BootstrapForm::open(array('url' => \route( \Backend::getPathPrefix() . '.users.store'), 'files'=>true, 'class'=>'panel form-horizontal js-validation-form', 'id'=>'')) }}
			@else
				{{ BootstrapForm::model($post, array('method' => 'patch', 'files'=>true, 'route' => array(\Backend::getPathPrefix() . '.users.update', $post->getKey()), 'class'=>'form-horizontal js-validation-form panel', 'id'=>'')) }}
			@endif

				<div class="panel-body">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#uiform-tab-main" data-toggle="tab">Общее</a>
						</li>
						<li>
							<a href="#uiform-tab-description" data-toggle="tab">Детали</a>
						</li>
						<li>
							<a href="#uiform-tab-seo" data-toggle="tab">SEO</a>
						</li>
					</ul>
					<div class="tab-content tab-content-bordered">
						<div class="tab-pane fade active in" id="uiform-tab-main">
							{{-- Активность --}}
							{{ BootstrapForm::checkboxField('is_visible', 'Отображать на сайте', empty(Input::old('is_visible'))? 1 : Input::old('is_visible')) }}
							{{-- Заголовок --}}
							{{ BootstrapForm::textField('header', 'Заголовок', Input::old('name'), ['required'=>'required']) }}
							{{-- Фото --}}
							{{ BootstrapForm::imageField('image', 'Изображение', $imgValue) }}
							{{-- Описание --}}
							{{ BootstrapForm::textareaField('brief', 'Краткое описание', Input::old('brief'), ['rows'=>5, 'required'=>'required']) }}
						</div>
						<div class="tab-pane fade" id="uiform-tab-description">
							{{-- Подробное описание --}}
							{{ BootstrapForm::contentField('content', 'Детальное описание', Input::old('content'))}}
						</div>
						<div class="tab-pane fade" id="uiform-tab-seo">
							{{-- SEO - Заголовок страницы --}}
							{{ BootstrapForm::textField('meta_title', 'Заголовок страницы', Input::old('meta_title')) }}
							{{-- SEO - Ключевые слова --}}
							{{ BootstrapForm::textareaField('meta_keywords', 'Ключевые слова', Input::old('meta_keywords'), ['rows'=>5]) }}
							{{-- SEP - Описание --}}
							{{ BootstrapForm::textareaField('meta_description', 'Описание', Input::old('meta_description'), ['rows'=>5]) }}
						</div>
					</div>

				</div>

				<div class="panel-footer text-right">
					{{ BootstrapForm::submit('Сохранить', array('class' => 'btn btn-primary')) }}
				</div>
			{{ BootstrapForm::close() }}

		</div>
	</div>
@stop

@section('styles')
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/blackboard.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.min.css">
@stop

@section('scripts')
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.min.js"></script>
@stop