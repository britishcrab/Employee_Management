@extends('layouts.admin_master')

@section('title', 'Employee delete')

@section('sidebar')
    <div class="col-xs-2">
        <ul class="nav nav-pills nav-stacked">
            <li><a href='{{route('top')}}'>トップ</a></li>
            <li><a href='{{route('report.home.get')}}'>日報</a></li>
            <li><a href='{{route('report.list.get')}}'>日報一覧</a></li>
        </ul>
    </div>
@endsection

@section('content')
    <h1>削除が完了しました。</h1>

@endsection
