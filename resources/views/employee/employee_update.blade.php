@extends('layouts.admin_master')

@section('title', 'Employee list')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>従業員情報更新<h1>
    <form class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="employee_id">ＩＤ：</label>
            <div class="col-sm-10" id="employee_id">
                {{$_POST['employee_id']}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="name">氏名</label>
            <div class="form-inline col-sm-10">
                姓：<input type="text" class="form-control" id="neme" name="last_name" value="{{$_POST['last_name']}}">名：<input type="text" class="form-control" id="neme" name="first_name" value="{{$_POST['first_name']}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">実行</button>
                <button type="submit" class="btn btn-default">取り消し</button>
            </div>
        </div>
    </form>


@endsection


            <h1>従業員情報更新<h1>
                    <form action="" method="post">
                        <!-- 氏名入力フォーム -->
                        <div class="form-horizontal form-group">
                            <label class="form-group control-label">ＩＤ：</label>{{$_POST['employee_id']}}<br>
                            <div class="form-group form-inline">
                                <label class="form-group control-label">氏名</label>
                                <label class="form-group">姓：</label><input type="text" class="form-control"　name="last_name" value="{{$_POST['last_name']}}">
                                <label class="form-group">名：<label><input type="text" class="form-control"　name="first_name" value="{{$_POST['first_name']}}"><br>
                            </div>
                        </div>
                        <!-- 送信ボタン -->
                        <div class="center-block">
                            <div class="btn-group col-xs-4">
                                <button type="submit" class="btn btn-primary col-xs-12">実行</button>
                            </div>
                            <div class="btn-group col-xs-4">
                                <button type="submit" class="btn btn-default col-xs-12">取り消し</button>
                            </div>
                        </div>
                    </form>