@extends('layouts.register_master')

@section('title', 'Employee register')

@section('sidebar')
    @parent
@endsection

@section('page_name', '従業員新規登録')


@section('form')
    {!! Form::open(['url' => route('admin.register.post'), 'class' =>"form-horizontal"])!!}
@endsection

@section('name')
    姓{!! Form::input('text', 'last_name', '', ['required', 'class' => 'form-control', 'id' => 'name']) !!}
    名{!! Form::input('text', 'first_name', '', ['required', 'class' => 'form-control', 'id' => 'name']) !!}
@endsection

@section('birthday')
    {!! Form::text('birthday', '', ['placeholder' => 'xxxx/xx/xx', 'autocomplete' => 'off']) !!}
@endsection

@section('mail')
    {!! Form::input('text', 'mail', '', ['required', 'class' => 'form-control', 'id' => 'mail']) !!}
@endsection