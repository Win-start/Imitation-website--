<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{{asset('layui/css/layui.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <script src="{{asset('layui/layui.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>

    </head>
    <body>
        @yield('content')
    </body>
</html>
