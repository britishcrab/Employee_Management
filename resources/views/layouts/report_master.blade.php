@extends('layouts.master')

@section('title', 'report')

@section('sidebar')
    <div class="col-xs-2">
        <ul class="nav nav-pills nav-stacked">
            <li><a href='{{route('top')}}'>トップ</a></li>
            <li><a href='{{route('report.home.get')}}'>日報</a></li>
        </ul>
    </div>
@endsection

@section('content')
    @yield('content')
@endsection