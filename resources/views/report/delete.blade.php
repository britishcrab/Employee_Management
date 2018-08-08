@extends('layouts.admin_master')

@section('title', 'Employee delete')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>日報削除</h1>

    <h2>{{$content['created_at']}}の「{{$content['title']}}」を削除します。 よろしいですか？</h2><br>
            <br>
            <br>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::open(['url' => route('report.delete.post'), 'class' =>"form-horizontal"]) !!}
                    {{Form::hidden('report_id', $content['id'])}}
                    <button type="submit" class="btn btn-primary col-xs-5">削除</button>
                    {{Form::close()}}
                    <button type="button" class="btn btn-default col-xs-5" onclick="location.href='{{route('report.list.get')}}'">キャンセル</button>
                </div>
            </div>
@endsection
