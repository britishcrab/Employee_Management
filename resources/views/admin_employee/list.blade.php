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
      {{Form::open(['url' => route('admin.get.update'), 'class' =>"form-horizontal"])}}
      {{Form::hidden('id', $row['id'])}}
      {{Form::hidden('last_name', $row['last_name'])}}
      {{Form::hidden('first_name', $row['first_name'])}}
      {{Form::hidden('role_name', $row->role->role_name)}}
      {{Form::hidden('password', $row['password'])}}
      <tr>
       <td>{{ str_pad($row['id'], 4, 0, STR_PAD_LEFT) }}</td>
       <td>{{ $row['last_name'] }}　{{ $row['first_name'] }}</td>
       <td>{{ $row->role->role_name }}</td>
       <td>
        <button type="submit" class="btn btn-secondary" name="update" >更新</button>
        <button type="submit" class="btn btn-secondary" name="delete">削除</button>
       </td>
       {{Form::close()}}
      </tr>
     @endforeach
    </table>
   </div>
@endsection