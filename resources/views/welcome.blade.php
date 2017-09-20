<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('including/header')
        
        <title>Laravel</title>

        
    </head>
    <body>
    @include('including/navbar')
    
    @yield('content')

    @include('including/linkjs')
    </body>
</html>