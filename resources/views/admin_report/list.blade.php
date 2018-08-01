@extends('layouts.admin_master')

@section('title', 'content')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>全社員日報一覧</h1>
            <div class="container">
            <table class="table table-striped table-bordered table-condensed">
                <tr>
                    <th>氏名</th>
                    <th>日付</th>
                    <th>タイトル</th>
                    <th></th>
                </tr>
        @foreach($reports as $row)
            {{Form::open(['url' => route('admin_report.content.post'), 'class' =>"form-horizontal"])}}
                    {{Form::hidden('created_at', $row['created_at'])}}
                    {{Form::hidden('title', $row['title'])}}
                    {{Form::hidden('text', $row['text'])}}
                    {{Form::hidden('comment', $row['comment'])}}
                <tr>
                    <td height="10">{{ $row['name'] }}</td>
                    <td height="10">{{ $row['created_at'] }}</td>
                    <td height="10">{{ $row['title'] }}</td>
                    <td height="10">
                        <button type="submit" class="btn btn-secondary">詳細</button>
                    </td>
                </tr>
            {{Form::close()}}
        @endforeach
            </table>
            </div>
@endsection
