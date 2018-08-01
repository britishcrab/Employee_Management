@extends('layouts.report_master')

@section('title', 'report')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>日報<h1>
            <input class="btn btn-success btn-block" type="button" onclick="location.href='{{route('report.create.get')}}'" value="日報作成">
            <input class="btn btn-info btn-block" type="button" onclick="location.href='{{route('report.list.get')}}'" value="過去の日報一覧">

@endsection
