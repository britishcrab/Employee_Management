@extends('layouts.master')

@section('title', 'Employee list')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>従業員一覧<h1>

<table class="table table-striped table-bordered">
 <tr>
 <th>id</th>
 <th>名前</th>
 <th>役職</th>
 <th>変更・削除</th>
 </tr>
@foreach($samples as $row)
 <tr>
 <td>{{ $row['employee_id'] }}</td>
 <td>{{ $row['name'] }}</td>
 <td>{{ $row['role'] }}</td>
 <td><button type="button" class="btn btn-secondary ">更新</button><button type="button" class="btn btn-secondary">削除</button></td>
 </tr>
@endforeach
</table>

{{--
<ul>
{{ var_dump($samples) }}
@foreach($samples as $row)

{{ var_dump($row) }}

<li>{{ $row['employee_id']. $row['name'].  $row['role'] }}</td>
<button type="button" class="btn btn-secondary">Secondary</button><button type="button" class="btn btn-secondary">Secondary</button>
@endforeach
<ul>
--}}
@endsection
