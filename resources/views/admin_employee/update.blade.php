@extends('layouts.admin_master')

@section('title', 'Employee update')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>従業員情報更新</h1>
    <div class="form-group lead">
	{{Form::open(['url' => route('admin.get.update.confirm'), 'class' =>"form-horizontal"])}}
        <div class="form-group">
            <label class="col-sm-3 control-label" for="employee_id">ＩＤ：</label>
            <div class="col-sm-9" id="employee_id">
				{{ str_pad($employee['id'], 4, 0, STR_PAD_LEFT) }}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="name">氏名：</label>
            <div class="form-inline col-sm-9">
                姓<input type="text" class="form-control" id="neme" name="last_name" value="{{$employee['last_name']}}">名<input type="text" class="form-control" id="neme" name="first_name" value="{{$employee['first_name']}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="role">役職：</label>
            {{$employee->role->role_name}}
            <select id="role" name="role_name">
                <option value="">変更</option>
                <option value="1">管理</option>
                <option value="2">役員</option>
                <option value="3">社員</option>
            </select>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="password">パスワード：</label>
            <div class="form-inline col-sm-9">
                <input type="password" class="form-control" id="password" name="last_name" value="{{$employee['password']}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="password_comfirm">パスワード(確認)：</label>
            <div class="form-inline col-sm-9">
                <input type="text" class="form-control" id="password_comfirm" name="last_name"">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="button" class="btn btn-primary col-xs-5">実行</button>
	{{Form::close()}}
                <button type="button" class="btn btn-default col-xs-5" onclick="location.href='{{route('admin.get.list')}}'">取り消し</button>
            </div>
        </div>
    </div>


@endsection