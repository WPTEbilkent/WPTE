<?php header('Content-Type: text/html; charset=utf-8'); ?>
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
            @yield('sidebar')
            </div>
    </div>

</main>

<footer>
    @yield('footer')
</footer>


</body>
</html>
