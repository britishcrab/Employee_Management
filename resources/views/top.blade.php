@extends('layouts.master')

@section('title', 'トップページ')

@section('sidebar')

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
        </div>
    </nav>

@endsection

@section('content')
    <h1>トップページ<h1>
    <input class="btn btn-default btn-block" type="button" onclick="location.href='employeeadmin'" value="社員管理">
    <input class="btn btn-default btn-block" type="button" onclick="location.href='laravel'" value="日報管理">
@endsection