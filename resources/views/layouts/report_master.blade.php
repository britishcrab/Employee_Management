<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EmployeesManagement - @yield('title')</title>
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap読み込み（スタイリングのため） -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript" language="javascript"></script>
    <script type="text/javascript">
        //// datapirckerのフォーマット変更
        $(function() {
            $("#datepicker").datepicker();
            $('#datepicker').datepicker("option", "dateFormat", 'yy/mm/dd' );
            $('#datepicker .date').datepicker({
                language: 'ja'
            });
        });
    </script>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Branding Image -->
            <a class="navbar-brand" href='{{ route('top') }}'>
                {{ config('app.name') }} - @yield('title')
            </a>
        </div>
    </div>
</nav>
@section('sidebar')

    <div class="col-xs-2">
        <ul class="nav nav-pills nav-stacked">
            <li><a href='{{route('top')}}'>トップ</a></li>
            <li><a href='{{route('report.home.get')}}'>日報</a></li>
        </ul>
    </div>
@show

<div class="container">
    @yield('content')
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
<script>
    $(function(){
        //Default
        $('#datepicker-default .date').datepicker({
            format: "yyyy年mm月dd日",
            language: 'ja'
        });

    });
</script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>
</html>
