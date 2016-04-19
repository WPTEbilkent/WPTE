<?php
$url_css_js="http://localhost/laravel/resources/assets/newDesign";
$url_vendor_ckeditor="http://localhost/laravel/vendor/unisharp/laravel-ckeditor/";
//$url_css_js = "http://localhost/bitirme/WPTE_v1/resources/assets/newDesign/";
//$url_vendor_ckeditor = "http://localhost/bitirme/WPTE_v1/vendor/unisharp/laravel-ckeditor/";
?>

@section('footer')
    <footer class="container padding-30-v theme-gray ui-light">
        <div class="fixed">
            <div class="row">
                <div class="col-8 small md-align-center">
                    <div class="footer-links">
                        <a class="link-default ease-link" href="{{url("/")}}">WPTE</a>
                        <a class="link-default ease-link" href="{{url("/QA")}}">SORU &amp; CEVAP</a>
                        <a class="link-default ease-link" href="{{url("/tutorial")}}">EĞİTİM &amp; MAKALELER</a>
                        <a class="link-default ease-link" href="{{url("/events")}}">ETKİNLİKLER</a>
                        <a class="link-default ease-link" href="{{url("/about")}}">HAKKIMIZDA</a>
                        <a class="link-default ease-link" href="{{url("/privacy")}}">GİZLİLİK</a>
                    </div>
                    <div class="dark">
                        Copyright © 2015 <a href="http://www.havelsan.com.tr" target="_blank">Havelsan A.Ş.</a>
                    </div>
                </div>
                <div class="col-4 align-right md-align-center">
                    <div class="footer-social">
                        <a class="btn btn-lg circle theme-youtestify ui-dark ease-bg" href="#" target="_blank"><i
                                    class="fa fa-twitter"></i></a>
                        <a class="btn btn-lg circle theme-youtestify ui-dark ease-bg" href="#" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@stop

<!-- header -->
@section('header')
    <header class="container theme-night ui-dark">
        <div class="fixed">
            <div class="row">
                <div class="col-static">
                    <div class="static-184 md-align-center">
                        <a class="youtestify-logo" href="{{url("/")}}"><img class="retina"
                                                                            src="{{$url_css_js}}/img/logo.png"
                                                                            alt="Youtestify"></a>
                    </div>
                    <div class="row row-no-padding">
                        <div class="col-12">
                            <nav class="header-nav">
                                <button class="ease-bg"><i class="fa fa-2x fa-bars ease-color"></i></button>
                                <ul class="list-custom theme-night ui-dark ease-opacity">
                                    <li><a class="ease-link" href="{{url("/")}}"><span
                                                    class="ease-color">WPTE</span></a></li>
                                    <!-- seçili olan sayfaya li.selected ekleyiniz -->
                                    <li><a class="ease-link" href="{{url("/QA")}}"><span class="ease-color">SORU &amp; CEVAP</span></a></li>
                                    <li><a class="ease-link" href="{{url("/tutorial")}}"><span class="ease-color">EĞİTİM &amp; MAKALELER</span></a></li>
                                    <li><a class="ease-link" href="{{url("/events")}}"><span class="ease-color">ETKİNLİKLER</span></a></li>
                                    @if(Auth::guest())
                                        <li><a class="ease-link" href="{{url("/auth/login")}}"><span class="ease-color">GİRİŞ</span></a>
                                        </li>
                                    @else
                                        <li><a class="ease-link" href="{{url("/profile")}}/{{Auth::user()->id}}"><span
                                                        class="ease-color">{{Auth::user()->name}}</span></a></li>
                                        <li><a class="ease-link" href="{{url("/auth/logout")}}"><span
                                                        class="ease-color">ÇIKIŞ</span></a></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop

@section('scripts')
    <meta name="description" content="A unique web platform for test engineers."/>
    <meta name="keywords"
          content="youtestify, articles, tutorials, qusetions, answers, track events, web platform, test engineers"/>
    <meta name="author" content="Youtestify.com"/>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

    <link rel="icon" href="img/favicon.ico"/>
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png"/>

    <link rel="stylesheet" href="{{$url_css_js}}/css/frogframework.css"/>
    <link rel="stylesheet" href="{{$url_css_js}}/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{$url_css_js}}/css/frontend.css"/>

    <script src="{{$url_css_js}}/js/jquery.min.js"></script>
    <script src="{{$url_css_js}}/js/frogframework.js"></script>
    <script src="{{$url_css_js}}/js/frontend.js"></script>
    <script src="{{$url_vendor_ckeditor}}ckeditor.js"></script>
    <script src="{{$url_vendor_ckeditor}}adapters/jquery.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
@stop

@section('smooth-scripts')
    <script>
        $(function () {
            jQuery.scrollSpeed(100, 1000);
        });
    </script>
    @stop

            <!-- sidebar -->
@section('sidebar')
    <div class="col-4">
        <div class="text text-icon rounded bordered light-bordered ease-form">
            <input id="searchText" type="text" placeholder="Ara">
            <button id="searchButton" class="icon fa fa-search ease-opacity" type="button"></button>
        </div>
        <div class="portlet padding-15 margin-20-t rounded bordered light-bordered theme-gray ui-x-light">
            <a href="#" target="_blank"><img class="img-responsive"
                                             src="{{$url_css_js}}/dummy/demo-banner.jpg"
                                             alt="Demo Banner"></a>
        </div>
    </div>
@stop