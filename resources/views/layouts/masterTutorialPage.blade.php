<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->

<html class="no-js"> <!--<![endif]-->


<body>

<!--  Necessary scripts  -->
@yield('scripts')


        <!-- smooth-scroll -->
@yield('smooth-script')


@yield('header')

<main>
    <div class="container">
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




