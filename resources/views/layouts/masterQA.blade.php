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
    <!--  Necessary scripts  -->
    @yield('scripts')


            <!-- smooth-scroll -->
    @yield('smooth-script')


</head>

<body>

@yield('header')

<main>
    <div class="container" id="qcontent">
        <div class="row">
            @yield('content')
            @yield('sidebar')
        </div>
    </div> <!-- end of container -->

</main>

<footer>
    @yield('footer')
</footer>


</body>
</html>
