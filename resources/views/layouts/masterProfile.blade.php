<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->

<html class="no-js"> <!--<![endif]-->


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
