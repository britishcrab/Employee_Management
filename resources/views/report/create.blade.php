@extends('layouts.create_master')

@section('title', 'report create')

@section('date_form')
    {{Form::text('created_at', '', ['id' => 'datepicker'])}}
@endsection

@section('title_form')
    {{Form::text('title')}}
@endsection

@section('content_form')
    <textarea  name="content" rows="10" class="form-control" id="textarea"></textarea>
@endsection
