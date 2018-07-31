@extends('layouts.admin_master')

@section('title', 'Employee list')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>{{$isrequest->input('employee_id')}}{{$isrequest->last_name}}{{$isrequest->first_name}}{{$isrequest->role}}従業員情報の更新が完了しました。<h1>
@endsection