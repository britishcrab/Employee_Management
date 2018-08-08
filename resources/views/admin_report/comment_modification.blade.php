@extends('layouts.admin_report_content')

@section('title', 'report')

@section('comment_form')
    <textarea  name="comment" placeholder="コメントを入力" rows="10" class="form-control">{{$content['comment']}}</textarea>
@endsection
