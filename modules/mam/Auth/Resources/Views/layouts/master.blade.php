<!DOCTYPE html>
<html lang="en">
<head>
    @include('Auth::partials.meta')

    <title>@yield('title') | {{ config('app.name') }}</title>

    @include('Auth::partials.css')
</head>
<body class="authentication-bg">

<div class="home-btn d-none d-sm-block">
    <a href="{{route('home.index')}}"><i class="fas fa-home h2 text-dark"></i></a>
</div>

<div class="account-pages mt-5 mb-5">
    <div class="container">
        @yield('content')
    </div>
</div>

@include('Auth::partials.js')
</body>
</html>
