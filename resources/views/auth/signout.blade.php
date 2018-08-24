@extends('layouts.admin_master')

@section('title', 'signin')

@section('sidebar')
@endsection

@section('content')
    <h1>サインアウトします。よろしいですか？</h1>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::open(['url' => route('signout.post'), 'class' =>"form-horizontal"]) !!}
            <input class="btn btn-primary col-xs-5" type="submit" value="実行">
            {!! Form::close() !!}
            <input class="btn btn-default col-xs-5" type="button" onclick="location.href='{{URL::previous()}}'" value="キャンセル">
        </div>
    </div>
@endsection
