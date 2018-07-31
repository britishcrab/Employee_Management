@extends('layouts.report_master')

@section('title', 'report create')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>日報作成</h1>
    {!! Form::open(['url' => route('report.post.create'), 'class' =>"form-horizontal"]) !!}
    <div class="form-group">
        <label class="col-sm-2 control-label" for="date">日付</label>
        <div class="col-sm-10" id="date">
        {{ Form::date('date', \Carbon\Carbon::now()) }}
        </div>

        <label class="col-sm-2 control-label" for="title">タイトル</label>
        <div class="col-sm-10" id="title">
            {{Form::text('title')}}
        </div>

        <label class="col-sm-2 control-label" for="textarea">本文</label>
        <div class="col-sm-10">
            <textarea  name="textarea" placeholder="複数行に渡るテキストを入力できる。" rows="10" class="form-control" id="textarea"></textarea>
        </div>
    </div>
    <div class="btn-group col-sm-12">
        <div class="btn-group col-sm-6">
            <input class="btn btn-primary btn-group-lg col-sm-8" type="submit" value="送信">
        </div>
        {!! Form::close() !!}
        <div class="btn-group col-sm-6">
            <a class="btn btn-default btn-group-lg col-sm-10" href='{{route('report.get.home')}}' role="button">取り消し</a>
        </div>
    </div>
@endsection
