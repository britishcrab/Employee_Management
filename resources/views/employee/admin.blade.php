@extends('layouts.master')

@section('title', 'admin')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>管理<h1>
    <div class="col-xs-8">
        <ul class="nav nav-pills nav-stacked">
			<input class="btn btn-default btn-block" type="button" onclick="location.href='list'" value="社員一覧">
			<input class="btn btn-default btn-block" type="button" onclick="location.href='laravel'" value="日報一覧">
        </ul>
    </div>
@endsection