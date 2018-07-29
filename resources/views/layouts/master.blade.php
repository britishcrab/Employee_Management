<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EmployeesManagement - @yield('title')</title>
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap読み込み（スタイリングのため） -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
</head>
<body>
@section('sidebar')
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }} - @yield('title')
                </a>
            </div>
        </div>
    </nav>
    <div class="col-xs-2">
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#">ダッシュボード</a></li>
            <li><a href="#">サーバー１</a></li>
            <li><a href="#">サーバー２</a></li>
            <li><a href="#">サーバー３</a></li>
        </ul>
    </div>
@show

<div class="container">
    @yield('content')
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
