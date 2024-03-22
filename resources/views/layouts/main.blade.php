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
    <link rel="stylesheet" href="{{asset("assets/css/sidebar.css")}}">
    @yield('styles')
</head>
<body>

    @include('layouts.sidebar')

    <div class="container">
        @yield('content')
    </div>

</body>

<script src="{{asset("assets/js/sidebar.js")}}"></script>
@yield('scripts')

</html>
