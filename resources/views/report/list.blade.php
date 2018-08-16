@extends('layouts.report_master')

@section('title', 'report')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>日報一覧</h1>
    <div class="container">
        <table class="table table-striped table-bordered table-condensed">
            <tr>
                <th>日付</th>
                <th>タイトル</th>
                <th>詳細・削除</th>
            </tr>
            @foreach($reports as $row)
                <tr>
                    <td height="10">{{ $row['created_at'] }}</td>
                    <td height="10">{{ $row['title'] }}</td>
                    <td height="10">
                        <button type="button" class="btn btn-secondary" onclick="location.href='{{route('report.content.get', ['report_id' => $row['id']])}}'">詳細</button>
                        <button type="button" class="btn btn-secondary" onclick="location.href='{{route('report.delete.get', ['report_id' => $row['id']])}}'">削除</button>
                    </td>
                </tr>
            @endforeach
            @isset($msg)
                <h3>{{$msg}}</h3>
            @endisset
        </table>
    </div>
@endsection
