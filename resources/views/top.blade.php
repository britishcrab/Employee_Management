@extends('layouts.admin_master')

@section('title', 'トップページ')

@section('sidebar')
@endsection

@section('content')
    <h1>トップページ<h1>
<input class="btn btn-success btn-block" type="button" onclick="location.href='{{route('admin.get.home')}}'" value="社員管理">
<input class="btn btn-info btn-block" type="button" onclick="location.href='{{route('report.get.home')}}'" value="日報管理">
@endsection