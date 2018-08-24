@extends('layouts.admin_master')

@section('title', 'admin')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>管理<h1>
    <div class="col-xs-12">
        <ul class="nav nav-pills nav-stacked">
			<input class="btn btn-success btn-block" type="button" onclick="location.href='{{route('employee.list')}}'" value="社員一覧">
			<input class="btn btn-info btn-block" type="button" onclick="location.href='{{route('admin_report.list.get')}}'" value="日報一覧">
        </ul>
    </div>
@endsection