<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('Home::partials.meta')
    <title>@yield('title') | {{config('app.name')}}</title>
    @include('Home::partials.css')
</head>

<body>
@include('Home::partials.preloader')
<!-- Preloader Start -->
<div class="main-wrap">
    <!--Offcanvas sidebar-->
    @include('Home::partials.sidebar')
    <!-- Main Header -->
    @include('Home::partials.header')
    <!-- Main Wrap Start -->
    @yield('content')
    <!-- Footer Start-->
    @include('Home::partials.footer')
</div> <!-- Main Wrap End-->
<div class="dark-mark"></div>
<!-- Vendor JS-->
@include('Home::partials.js')
</body>

</html>
