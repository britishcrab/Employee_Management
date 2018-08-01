@extends('layouts.admin_master')

@section('title', 'Employee list')

@section('sidebar')
    @parent
@endsection

@section('content')
 <h1>従業員一覧<h1>
   <div class="conttainer">
    <table class="table table-striped table-bordered">
     <tr>
      <th class="col-xs-2">id</th>
      <th class="col-xs-3">名前</th>
      <th class="col-xs-3">役職</th>
      <th class="col-xs-2">情報更新・削除</th>
     </tr>
     @foreach($samples as $row)
      <form action='{{route('admin.get.update')}}' method="POST">
       {{ csrf_field() }}
       <input type="hidden" name="employee_id" value="{{$row['employee_id']}}">
       <input type="hidden" name="last_name" value="{{$row['last_name']}}">
       <input type="hidden" name="first_name" value="{{$row['first_name']}}">
       <input type="hidden" name="role" value="{{$row['role']}}">
       <tr>
        <td>{{ $row['employee_id'] }}</td>
        <td>{{ $row['last_name'] }}　{{ $row['first_name'] }}</td>
        <td>{{ $row['role'] }}</td>
        <td>
         <button type="submit" class="btn btn-secondary" name="update" >更新</button>
         <button type="submit" class="btn btn-secondary" name="delete">削除</button>
        </td>
      </form>
      </tr>
     @endforeach
    </table>
    </form>
   </div>
@endsection
