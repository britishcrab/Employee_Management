@extends('layouts.admin_master')

@section('title', 'report create')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>この内容で送信します。よろしいですか？</h1>
    <div class="form-group">
        <div class="col-sm-12">
            <label class="col-sm-2 control-label" for="date">コメント</label>
            <div class="col-sm-10" id="date">
                <p class="lead">{{ $comment['comment'] }}</p>
            </div>
        </div>
    <div class="btn-group col-sm-12">
        <div class="btn-group col-sm-6">
            {!! Form::open(['url' => route('report.comment.confirm.post'), 'class' =>"form-horizontal"]) !!}
            <input class="btn btn-primary btn-group-lg col-sm-8" type="submit" name="send" value="送信">
            {!! Form::close() !!}
        </div>
        <div class="btn-group col-sm-6">
            <input class="btn btn-default btn-group-lg col-sm-8" type="submit" onclick="location.href='{{route('report.modification.get')}}'" name="status" value="編集に戻る">
        </div>
    </div>
@endsection
