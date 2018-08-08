@extends('layouts.report_master')

@section('title', 'report')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>日報詳細<h1>
            <div class="form-group lead">
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
                        <p class="lead">{{$content['content']}}</p>
                    </div>
                </div>

                <div class="col-sm-12">
                    <label class="col-sm-2 control-label" for="textarea">コメント</label>
                    <div class="col-sm-10" id="textarea">
                        {{var_dump($content)}}
                        {{--@if(isset($content->comment->comment))--}}
                            {{--@foreach($content->comment->comment as $comment)--}}
                            {{--<p class="lead">{{$content->comment->comment}}</p>--}}
                            {{--@endforeach--}}
                        {{--@else--}}
                            {{--@foreach($content->comment->comment as $comment)--}}
                            {{--<p class="lead">{{$comment}}</p>--}}
                            {{--@endforeach--}}
                        {{--@endif--}}
                    </div>
                </div>
            </div>
@endsection
