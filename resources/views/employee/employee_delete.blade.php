@extends('layouts.admin_master')

@section('title', 'Employee list')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>従業員削除<h1>

    {{$_POST['last_name']}} {{$_POST['first_name']}} を削除します。 よろしいですか？<br>
            <br>
            <br>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary col-xs-5" onclick="location.href='employee_update'">削除</button>
                    <button type="button" class="btn btn-default col-xs-5" onclick="location.href='list'">キャンセル</button>
                </div>
            </div>
@endsection
