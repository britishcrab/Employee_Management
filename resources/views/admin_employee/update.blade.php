@extends('layouts.register_master')

@section('title', 'Employee update')

@section('sidebar')
    @parent
@endsection

@section('page_name', '従業員情報更新')

@section('name')
    姓{!! Form::input('text', 'last_name', $employee['last_name'], ['required', 'class' => 'form-control', 'id' => 'name']) !!}
    名{!! Form::input('text', 'first_name', $employee['first_name'], ['required', 'class' => 'form-control', 'id' => 'name']) !!}
@endsection

@section('birthday')
    {!! Form::text('birthday', str_replace ('-', '/', $employee['birthday'])) !!}
@endsection

@section('mail')
    {!! Form::input('text', 'mail', $employee['mail'], ['required', 'class' => 'form-control', 'id' => 'mail']) !!}
@endsection