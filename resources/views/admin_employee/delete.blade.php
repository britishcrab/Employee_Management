@extends('layouts.admin_master')

@section('title', 'Employee delete')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>従業員削除<h1>

    {{$employee['last_name']}} {{$employee['first_name']}} を削除します。 よろしいですか？<br>
            <br>
            <br>
                <div class="col-sm-offset-2 col-sm-10">
                    {{Form::open(['url' => route('admin.delete.post'), 'class' =>"form-horizontal"])}}
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary col-xs-5" name = 'id' value = {{$employee['id']}}>削除</button>
                    {{Form::close()}}
                    <button type="button" class="btn btn-default col-xs-5" onclick="location.href='{{route('admin.get.list')}}'">キャンセル</button>
                    </div>
                </div>
@endsection
