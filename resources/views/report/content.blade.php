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
                        <p class="lead">{{ date('Y-m-d', strtotime($content['created_at'])) }}</p>
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
                        @if($content['is_comment'])
                            @foreach($content->comment as $a)
                                <p class="lead">{{$a->comment}}</p>
                            @endforeach
                        @else
                            <p class="lead">コメントはありません</p>
                        @endif
                    </div>
                </div>
            </div>
@endsection
