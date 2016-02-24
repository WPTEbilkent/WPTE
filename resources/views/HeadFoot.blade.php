<?php
$url_css_js="http://localhost/laravel/resources/assets/";

?>

@section('footer')
    <div class="container">
        <div class="row">
            <!-- copyright -->
            <div class="col-md-4 col-sm-4">
                copyright &copy; 2015 <a href="#" style="margin-left: 4px;">Your website Link</a>
                <br>
                Theme by <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
            </div>

            <!-- footer share button -->
            <div class="col-md-4 col-sm-4">
                <ul class="social-share text-center">
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul> <!-- /.social-share -->
            </div>

            <!-- footer-nav -->
            <div class="col-md-4 col-sm-4">
                <ul class="footer-nav">
                    <li><a href="about.html">About</a></li>
                    <li><a href="privacy.html">Privacy</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul> <!-- /.footer-nav -->
            </div>
        </div>
    </div>

@stop
@section('header')
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="{{$url_css_js}}img/logo.png" alt="Site Logo">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{action("HomeController@index")}}">Home</span></a></li>
                    <li><a href="html5-templates.html">HTML5 Templates</a></li>
                    <li><a href="wordpress-themes.html">Wordpress Themes</a></li>
                    <li><a href="{{action("QAController@index")}}">Design Inspiration</a></li>
                    <li><a href="resources.html">Resource</a></li>
                </ul>
            </div><!-- end of /.navbar-collapse -->
        </div><!-- end of /.container -->
    </nav>

@stop
@section('scripts')
    <script type="text/javascript" src="{{$url_css_js}}js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="{{$url_css_js}}js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{$url_css_js}}js/jQuery.scrollSpeed.js"></script>
@stop
@section('smooth-scripts')
    <script>
        $(function () {
            jQuery.scrollSpeed(100, 1000);
        });
    </script>
@stop
@section('sidebar')
        <!-- sidebar -->
    <aside class="col-md-4 col-sm-8 col-xs-8">
        <div class="sidebar">

            <!-- search option -->
            <div class="search-widget">
                <div class="input-group margin-bottom-sm">
                    <input id="searchText" class="form-control" type="text" placeholder="Search here">
                    <a id="searchButton" href="#" class="input-group-addon">
                        <i class="fa fa-search fa-fw"></i>
                    </a>
                </div>
            </div>

            <a href="http://themewagon.com/" class="template-images">
                <img class="img-responsive" src="{{$url_css_js}}img/store1.png" alt="Template Store">

                <div class="overlay"></div>
            </a>

            <!-- subscribe form -->
            <div class="subscribe-widget">
                <h4 class="text-capitalize text-center">
                    get recent update by email
                </h4>

                <div class="input-group margin-bottom-sm">
                    <input class="form-control" type="text" placeholder="Your Email">
                    <a href="#" class="input-group-addon">
                        <i class="fa fa-paper-plane fa-fw"></i>
                    </a>
                </div>
            </div>

            <!-- sidebar share button -->
            <div class="share-widget hidden-xs hidden-sm">
                <ul class="social-share text-center">
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul> <!-- /.sidebar-share-button -->
            </div> <!-- /.share-widget -->

        </div>
    </aside>
    <!-- end of sidebar -->


@stop