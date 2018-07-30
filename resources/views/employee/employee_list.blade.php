@extends('layouts.admin_master')

@section('title', 'Employee list')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>従業員一覧<h1>

<form action="employee_edit" method="POST">
 {{ csrf_field() }}
<table class="table table-striped table-bordered">
 <tr>
 <th>id</th>
 <th>名前</th>
 <th>役職</th>
 <th>変更・削除</th>
 </tr>
@foreach($samples as $row)
  <form action="employee_edit" method="POST">
<input type="hidden" name="employee_id" value="{{$row['employee_id']}}">
<input type="hidden" name="last_name" value="{{$row['last_name']}}">
<input type="hidden" name="first_name" value="{{$row['first_name']}}">
<input type="hidden" name="role" value="{{$row['role']}}">
 <tr>
 <td>{{ $row['employee_id'] }}</td>
 <td>{{ $row['last_name'] }}　{{ $row['first_name'] }}</td>
 <td>{{ $row['role'] }}</td>
  <td>
   <button type="submit" class="btn btn-secondary" name="update">更新</button>
   <button type="submit" class="btn btn-secondary" name="delete">削除</button>
  </td>
  </form>
 </tr>
@endforeach
</table>
</form>


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
