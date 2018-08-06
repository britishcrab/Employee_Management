@extends('layouts.admin_master')

@section('title', 'Employee list')

@section('sidebar')
    @parent
@endsection

@section('content')
 <h1>従業員一覧</h1>
   <div class="conttainer">
    <table class="table table-striped table-bordered">
     <tr>
      <th class="col-xs-2">id</th>
      <th class="col-xs-3">名前</th>
      <th class="col-xs-3">役職</th>
      <th class="col-xs-2">情報更新・削除</th>
     </tr>
     @foreach($employees as $row)
      <tr>
       <td>{{ str_pad($row['id'], 4, 0, STR_PAD_LEFT) }}</td>
       <td>{{ $row['last_name'] }}　{{ $row['first_name'] }}</td>
       <td>{{ $row->role->role_name }}</td>
       <td>
		<input class="btn btn-secondary" type="button" onclick="location.href='{{route('admin.get.update', ['id' => $row['id']])}}'" value="更新">
		<input class="btn btn-secondary" type="button" onclick="location.href='{{route('admin.get.delete', ['id' => $row['id']])}}'" value="削除">
       </td>
      </tr>
     @endforeach
    </table>
   </div>
 <div class="conttainer">
  <input class="btn btn-secondary" type="button" onclick="location.href='{{route('admin.register.get')}}'" value="新規登録">
 </div>
@endsection