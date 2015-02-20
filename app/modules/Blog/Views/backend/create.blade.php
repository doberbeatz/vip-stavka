@extends('backend::layouts.default')

@section('title')
	@if(!isset($post)||$post===null||$post===false)
		Блог: добавление
	@else
		Блог: редактирование статьи {{ $user->getName() }} ({{ $user->getLogin() }})
	@endif
@stop

@section('content')

	{{-- Форма статьи --}}
	<div class="row">
		<div class="col-lg-7">

			@if(!isset($post))
				{{ BootstrapForm::open(array('url' => \route( \Backend::getPathPrefix() . '.users.store'), 'files'=>true, 'class'=>'panel form-horizontal js-validation-form', 'id'=>'')) }}
			@else
				{{ BootstrapForm::model($user, array('method' => 'patch', 'files'=>true, 'route' => array(\Backend::getPathPrefix() . '.users.update', $user->getKey()), 'class'=>'form-horizontal js-validation-form panel', 'id'=>'')) }}
			@endif

				<div class="panel-body">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#uiform-tab-main" data-toggle="tab">Общее</a>
						</li>
						<li class="">
							<a href="#uiform-tab-description" data-toggle="tab">Детали</a>
						</li>
					</ul>
					<div class="tab-content tab-content-bordered">
						<div class="tab-pane fade active in" id="uiform-tab-main">
							{{-- Активность --}}
							<div class="form-group">
								<div class="col-sm-8 col-sm-offset-4">
									<div class="checkbox">
										<label for="is_active">{{ BootstrapForm::checkbox('is_active', Input::old('is_active'), false ,array('class' =>'px', 'id' => 'is_active')) }}<span class="lbl">{{ BootstrapForm::label('is_active', 'Активность', array('class' =>'')) }}</span></label>
									</div>
								</div>
							</div>

							{{-- Заголовок --}}
							<div class="form-group">
								{{ BootstrapForm::label('header', 'Заголовок', array('class' =>'col-sm-4 control-label')) }}
								<div class="col-sm-8">
									{{ BootstrapForm::text('header', Input::old('header'), array('class' => ($errors->has('header') ?  'error form-control js-valid-text' : 'form-control js-valid-text'))) }}
								</div>
							</div>

							{{-- Описание --}}
							<div class="form-group">
								{{ BootstrapForm::label('brief', 'Описание', array('class' =>'col-sm-4 control-label')) }}
								<div class="col-sm-8">
									{{ BootstrapForm::textarea('brief', Input::old('brief'), array('class' => ($errors->has('brief') ?  'error form-control js-valid-text' : 'form-control js-valid-text'), 'rows'=>5)) }}
									<p class="help-block">Короткое описание статьи.</p>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="uiform-tab-description">
							{{-- Подробное описание --}}
							<div class="form-group">
								{{ BootstrapForm::label('description', 'Детальное описание', array('class' =>'col-sm-4 control-label')) }}
								<div class="col-sm-8">
									{{ BootstrapForm::textarea('description', Input::old('description'), array('class' => ($errors->has('description') ?  'error form-control js-valid-text' : 'form-control js-valid-text'))) }}
								</div>
							</div>
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