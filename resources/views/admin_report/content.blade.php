@extends('layouts.report_master')

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
                        <p class="lead">{{ $content['created_at'] }}</p>
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
                        <p class="lead">{{$content['text']}}</p>
                    </div>
                </div>

                <div class="col-sm-12">
                    <label class="col-sm-2 control-label" for="textarea">コメント</label>
                {{Form::open(['url' => route('admin_report.comment.post'), 'class' =>"form-horizontal"])}}
                    <div class="col-sm-10" id="textarea">
                        @if($content['comment'] != "")
                            <textarea  name="comment" placeholder="コメントを入力" rows="10" class="form-control">{{$content['comment']}}</textarea>
                        @else
                            <textarea  name="comment" placeholder="コメントを入力" rows="10" class="form-control"></textarea>
                        @endif
                    </div>
                </div>
                <div class="text-center">
                    <input class="btn btn-primary btn-group-lg col-sm-2 col-sm-offset-5" type="submit" value="送信">
                </div>
                {{Form::close()}}
            </div>
@endsection
