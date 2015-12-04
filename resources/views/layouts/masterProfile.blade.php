<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->

<html class="no-js"> <!--<![endif]-->
<head>
    <base href="http://localhost/laravel/public/">
    <!-- meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Theme Blog - Web Template Design</title>

    <!-- stylesheets -->
    <link rel="stylesheet" href="../resources/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/assets/css/animate.css">
    <link rel="stylesheet" href="../resources/assets/css/style.css">

</head>

<body>

@yield('header')

<main>

    @yield('content')

</main>

<footer>
    @yield('footer')
</footer>

<!--  Necessary scripts  -->
@yield('scripts')


        <!-- smooth-scroll -->
@yield('smooth-script')


</body>
</html>
