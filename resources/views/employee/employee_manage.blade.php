@extends('layouts.master')

@section('title', 'トップページ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>トップページ<h1>
    <input class="btn btn-default btn-block" type="button" onclick="location.href='employeeadmin'" value="社員管理">
    <input class="btn btn-default btn-block" type="button" onclick="location.href='laravel'" value="日報管理">
@endsection