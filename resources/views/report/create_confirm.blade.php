@extends('layouts.report_master')

@section('title', 'report create')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>この内容で送信します。よろしいですか？</h1>
    {!! Form::open(['url' => route('report.create.send.post'), 'class' =>"form-horizontal"]) !!}
    {{Form::hidden('date', $report_data['date'])}}
    {{Form::hidden('title', $report_data['title'])}}
    {{Form::hidden('text', $report_data['text'])}}
    <div class="form-group">
        <div class="col-sm-12">
            <label class="col-sm-2 control-label" for="date">日付</label>
            <div class="col-sm-10" id="date">
                <p class="lead">{{ $report_data['date'] }}</p>
            </div>
        </div>

        <div class="col-sm-12">
            <label class="col-sm-2 control-label" for="title">タイトル</label>
            <div class="col-sm-10" id="title">
                <p class="lead">{{$report_data['title']}}</p>
            </div>
        </div>

        <div class="col-sm-12">
            <label class="col-sm-2 control-label" for="textarea">本文</label>
            <div class="col-sm-10" id="textarea">
                <p class="lead">{{$report_data['text']}}</p>
            </div>
        </div>
    </div>
    <div class="btn-group col-sm-12">
        <div class="btn-group col-sm-6">
            <input class="btn btn-primary btn-group-lg col-sm-8" type="submit" name="send" value="送信">
        </div>
        <div class="btn-group col-sm-6">
            <input class="btn btn-primary btn-group-lg col-sm-8" type="submit" value="編集に戻る">
        </div>
        {!! Form::close() !!}
    </div>
@endsection
