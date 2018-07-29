@extends('layouts.master')

@section('title', 'Employee list')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>従業員一覧<h1>
<ul>
{{ var_dump($samples) }}
@foreach($samples as $row)

{{ var_dump($row) }}

<li>{{ $row['employee_id']. $row['name'].  $row['role'] }}</td>
<button type="button" class="btn btn-secondary">Secondary</button><button type="button" class="btn btn-secondary">Secondary</button>
@endforeach
<ul>
@endsection
