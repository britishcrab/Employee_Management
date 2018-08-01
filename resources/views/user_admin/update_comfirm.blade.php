@extends('layouts.admin_master')

@section('title', 'Employee update-comfirm')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>{{$request_data->input('employee_id')}}{{$request_data->last_name}}{{$request_data->first_name}}{{$request_data->role}}従業員情報の更新が完了しました。<h1>
@endsection