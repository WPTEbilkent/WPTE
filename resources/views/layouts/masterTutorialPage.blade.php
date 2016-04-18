<?php header('Content-Type: text/html; charset=utf-8'); ?>
        <!--al-->
<!DOCTYPE html>
<html dir="ltr" lang="tr">

<head>
    <title>YouTestify - A unique web platform for test engineers</title>
    <!--  Necessary scripts  -->
    @yield('scripts')

</head>

<body>
@yield('header')

<main role="main" class="container">
    @yield('content')

</main>
<!-- footer -->
@yield('footer')

</body>
</html>





