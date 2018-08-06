@extends('layouts.report_master')

@section('title', 'report create')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>日報作成</h1>
    {{Form::open(['url' => route('report.create.post'), 'class' =>"form-horizontal"])}}
    <div class="form-group">
        <div class="col-sm-12">
            <label class="col-sm-2 control-label" for="date">日付</label>
            <div class="col-sm-10" id="date">
                {{Form::text('birthday', '', ['id' => 'datepicker'])}}
            </div>
        </div>
        <script type="text/javascript">
            //// datapirckerのフォーマット変更
            $(function() {
                $("#datepicker").datepicker();
                $('#datepicker').datepicker("option", "dateFormat", 'yy-mm-dd' );
                $('#datepicker .date').datepicker({
                    language: 'ja'
                });
            });
        </script>

        <div class="col-sm-12">
            <label class="col-sm-2 control-label" for="title">タイトル</label>
            <div class="col-sm-10" id="title">
                @if(isset($create_data))
                    {{Form::text('title', $value = $create_data['title'])}}
                @else
                    {{Form::text('title')}}
                @endif
            </div>
        </div>

        <div class="col-sm-12">
            <label class="col-sm-2 control-label" for="textarea">本文</label>
            <div class="col-sm-10">
                @if(isset($create_data))
                    <textarea  name="text" rows="10" class="form-control" id="textarea"> {{ $create_data['text'] }} </textarea>
                @else
                    <textarea  name="text" rows="10" class="form-control" id="textarea"></textarea>
                @endif
            </div>
        </div>
    </div>
    <div class="btn-group col-sm-12">
        <div class="btn-group col-sm-6">
            <input class="btn btn-primary btn-group-lg col-sm-8" type="submit" value="送信">
        </div>
        {{Form::close()}}
        <div class="btn-group col-sm-6">
            <a class="btn btn-default btn-group-lg col-sm-10" href='{{route('report.home.get')}}' role="button">取り消し</a>
        </div>
    </div>
@endsection
