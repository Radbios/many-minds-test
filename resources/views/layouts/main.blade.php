<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>

    <link rel="icon" href="{{asset("assets/image/C.png")}}" type="image/x-icon">

    <link rel="stylesheet" href="{{asset("assets/css/main.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/var.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/sidebar.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/pagination.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/card.css")}}">
    @yield('styles')
</head>
<body>

    @include('layouts.sidebar')

    <div class="container">
        <div class="content">
            @yield('content')
        </div>
    </div>
    @include('includes.flash-message')
</body>

<script src="{{asset("assets/js/sidebar.js")}}"></script>
<script src="{{asset("assets/js/main.js")}}"></script>
@yield('scripts')

</html>
