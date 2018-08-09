@extends('layouts.admin_master')

@section('title', 'report')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>日報詳細</h1>
            <div class="container lead">
                <div class="col-sm-12">
                    <label class="col-sm-2 control-label" for="date">日付</label>
                    <div class="col-sm-10" id="date">
                        <p class="lead">{{ date('Y-m-d', strtotime($content['created_at'])) }}</p>
                    </div>
                </div>

                <div class="col-sm-12">
                    <label class="col-sm-2 control-label" for="name">氏名</label>
                    <div class="col-sm-10" id="name">
                        <p class="lead">{{$content->employee->last_name}} {{$content->employee->first_name}}</p>
                    </div>
                </div>

                <div class="col-sm-12">
                    <label class="col-sm-2 control-label" for="title">タイトル</label>
                    <div class="col-sm-10" id="title">
                        <p class="lead">{{$content['title']}}</p>
                    </div>
                </div>

                <div class="col-sm-12">
                    <label class="col-sm-2 control-label" for="textarea">本文</label>
                    <div class="col-sm-10" id="textarea">
                        <p class="lead">{{$content['content']}}</p>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                    <label class="col-sm-2 control-label" for="textarea">コメント</label>
                {{Form::open(['url' => route('admin_report.comment.post'), 'class' =>"form-horizontal"])}}
                    {{Form::hidden('report_id', $content['id'])}}
                    <div class="col-sm-10" id="textarea">
                        @yield('comment_form')

                        @if ($errors->has('comment'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-inline col-lg-offset-2">
                    <div><input class="btn btn-primary btn-group-lg col-sm-4" type="submit" value="送信"></div>
                    {{Form::close()}}
                    <div><input class="btn btn-default btn-group-lg col-sm-4" onclick="location.href='{{route('admin_report.list.get')}}'" type="submit" value="戻る"></div>
                </div>
            </div>
@endsection
