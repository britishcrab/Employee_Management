@extends('layouts.admin_master')

@section('title', 'Employee list')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>従業員削除<h1>
    <div class="col-xs-8">
        <ul class="nav nav-pills nav-stacked">
			<input class="btn btn-default btn-block" type="button" onclick="location.href='list'" value="削除">
			<input class="btn btn-default btn-block" type="button" onclick="location.href='list'" value="キャンセル">
        </ul>
    </div>
@endsection
