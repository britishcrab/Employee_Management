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
                <tr>
                    <td height="10">{{ $row['is_employee'] or $row->employee->last_name. $row->employee->first_name }}</td>
                    <td height="10">{{ $row['created_at'] }}</td>
                    <td height="10">{{ $row['title'] }}</td>
                    <td height="10">
                        <button type="submit" class="btn btn-secondary" onclick="location.href='{{route('admin_report.content.get', ['report_id' => $row['id']])}}'">詳細</button>
                    </td>
                </tr>
        @endforeach
            </table>
            </div>
@endsection
