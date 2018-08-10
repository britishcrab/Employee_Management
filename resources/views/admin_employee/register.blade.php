@extends('layouts.register_master')

@section('title', 'Employee update')

@section('sidebar')
    @parent
@endsection

@section('page_name', '従業員新規登録')

@section('name')
    {!! Form::open(['url' => route('admin.register.post'), 'class' =>"form-horizontal"])!!}
@endsection

@section('birthday')
    {{Form::text('birthday', '', ['id' => 'datepicker',"placeholder"=>"xxxx/xx/xx"])}}
@endsection

@section('mail')
    {!! Form::input('text', 'mail', '', ['required', 'class' => 'form-control', 'id' => 'mail']) !!}
@endsection