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
            <div class="col-sm-12">
                <div class="form-group{{ $errors->has('created_at') ? ' has-error' : '' }}">
                    <label class="col-sm-2 control-label" for="date">日付</label>
                    <div class="col-sm-10" id="date">
                        @yield('date_form')
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
            </div>

            <div class="col-sm-12">
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label class="col-sm-2 control-label" for="title">タイトル</label>
                    <div class="col-sm-10" id="title">
                        @yield('title_form')

                        @if ($errors->has('title'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                    <label class="col-sm-2 control-label" for="textarea">詳細</label>
                    <div class="col-sm-10">
                        @yield('content_form')

                        @if ($errors->has('content'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
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
