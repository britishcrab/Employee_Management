@extends('layouts.report_master')

@section('title', 'report create')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>この内容で送信します。よろしいですか？</h1>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="date">日付</label>
        <div class="col-sm-10" id="date">
            {{ $_GET['date'] }}
        </div>

        <label class="col-sm-2 control-label" for="title">タイトル</label>
        <div class="col-sm-10" id="title">
            {{ $_GET['title'] }}
        </div>

        <label class="col-sm-2 control-label" for="textarea">本文</label>
        <div class="col-sm-10">
            {{ $_GET['textarea'] }}
        </div>
    </div>
    <div class="btn-group col-sm-12">
        <div class="btn-group col-sm-6">
            <input class="btn btn-primary btn-group-lg col-sm-8" type="submit" value="送信">
        </div>
        <div class="btn-group col-sm-6">
            <a class="btn btn-default btn-group-lg col-sm-8" href='{{route('report.get.home')}}' role="button">取り消し</a>
        </div>
    </div>
@endsection
