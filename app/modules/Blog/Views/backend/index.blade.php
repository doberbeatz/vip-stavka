@extends('backend::layouts.default')

@section('title')
    Блог
@stop

@section('content')
    {{ $grid->render() }}
@stop