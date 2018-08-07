@extends('layouts.admin_master')
@section('title', 'Employee update')

@section('sidebar')
@parent
@endsection

@section('content')
<h1>従業員新規登録</h1>
<div class="form-group lead">
    {!! Form::open(['url' => route('admin.register.post'), 'class' =>"form-horizontal"])!!}
    <div class="form-group">
        <label class="col-sm-3 control-label" for="name">氏名：</label>
        <div class="form-inline col-sm-9">
            姓{!! Form::input('text', 'last_name', '', ['required', 'class' => 'form-control', 'id' => 'name']) !!}
            名{!! Form::input('text', 'first_name', '', ['required', 'class' => 'form-control', 'id' => 'name']) !!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="birthday">生年月日：</label>
        <div class="dateArea">
            <div class="col-sm-9" id="birthday">
                {{Form::text('birthday', '', ['id' => 'datepicker',"placeholder"=>"xxxx/xx/xx"])}}
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="mail">メールアドレス：</label>
        <div class="col-sm-9" id="mail">
            {!! Form::input('text', 'mail', '', ['required', 'class' => 'form-control', 'id' => 'mail']) !!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="password">パスワード：</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="password" name="password">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="password_comfirm">パスワード(確認)：</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="password_comfirm" name="password_confirmation">
        </div>
    </div>
    <div class="form-group" >
        <label class="col-sm-3 control-label" for="role_id">役職：</label>
        <div class="form-group"  id="role_id">
            <select name="role_id">
                <option value="">選択</option>
                <option value="1">管理</option>
                <option value="2">役員</option>
                <option value="3">社員</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary col-xs-5">実行</button>
            {!! Form::close() !!}
            <button type="button" class="btn btn-default col-xs-5" onclick="location.href='{{route('admin.get.list')}}'">取り消し</button>
        </div>
    </div>
</div>


@endsection