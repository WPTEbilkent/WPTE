<?php
$url_css_js = "http://localhost/laravel/resources/assets/";
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Sedna: Free HTML5/CSS3 Template by Peter Finlan</title>
    <meta name="description" content="A free HTML5/CSS3 template made exclusively for Codrops by Peter Finlan"/>
    <meta name="keywords" content="html5 template, free, css3, one page, animations, agency, portfolio, web design"/>
    <meta name="author" content="Peter Finlan"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="{{$url_css_js}}css/bootstrap.min.css">
    <link rel="stylesheet" href="{{$url_css_js}}css/normalize.min.css">
    <link rel="stylesheet" href="{{$url_css_js}}css/jquery.fancybox.css">
    <link rel="stylesheet" href="{{$url_css_js}}css/flexslider.css">
    <link rel="stylesheet" href="{{$url_css_js}}css/styles.css">
    <link rel="stylesheet" href="{{$url_css_js}}css/queries.css">
    <link rel="stylesheet" href="{{$url_css_js}}css/etline-font.css">
    <link rel="stylesheet" href="{{$url_css_js}}bower_components/animate.css/animate.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="{{$url_css_js}}js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-7243260-2']);
        _gaq.push(['_trackPageview']);
        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
</head>
<body id="top">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<section class="hero">
    <section class="navigation">
        <header>
            <div class="header-content">
                <div class="logo"><a href="#"><img src="{{$url_css_js}}img/youtestify_small.png" alt="YouTestify Logo"></a>
                </div>
                <div class="header-nav">
                    <nav>
                        <ul class="primary-nav">
                            <li><a href="#question">SORU & CEVAP</a></li>
                            <li><a href="#assets">EĞİTİM</a></li>
                            <li><a href="#blog">ETKİNLİKLER</a></li>
                            <li><a href="#download">MAKALELER</a></li>
                        </ul>
                        <ul class="member-actions">
                             <li id="users"><a href="#login" class="login">GİRİŞ</a></li>
                            <li id="logout"><a href="/auth/register" class="btn-white btn-small">KAYIT OL</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="navicon">
                    <a class="nav-toggle" href="#"><span></span></a>
                </div>
            </div>
        </header>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="hero-content text-center">
                    <h1>YouTestify</h1>
                    <p class="intro">A unique web platform for test engineers.</p>
                    {{--<a href="#" class="btn btn-fill btn-large btn-margin-right">Download</a>--}}
                    {{--<a href="#" class="btn btn-accent btn-large">Learn more</a>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 intro-feature">
                {{--<div class="intro-icon">--}}
                {{--<span data-icon="&#xe033;" class="icon"></span>--}}
                {{--</div>--}}
                <div class="intro-content">
                    <h5>Articles & Tutorials</h5>
                    <p>Browse various informative articles and tutorials to improve your know-how!</p>
                    <p>Subscribe to your favorite authors to follow articles and blogs that interests you!</p>
                </div>
            </div>
            <div class="col-md-4 intro-feature">
                <div class="intro-content">
                    <h5>Questions & Answers</h5>
                    <p>Ask questions on Questions&Answers section to access professional information and expertise or
                        answer questions and
                        share your valuable information with others</p>
                </div>
            </div>
            <div class="col-md-4 intro-feature">
                <div class="intro-content last">
                    <h5>Track Events</h5>
                    <p>Track test engineering related events and improve your career in testing!</p>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="down-arrow floating-arrow"><a href="#"><i class="fa fa-angle-down"></i></a></div>--}}
</section>
<section class="question section-padding" id="question">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-7">
                <div class="feature-list">
                    <h3>Sedna will drive your product forward</h3>
                    <p>Present your product, start up, or portfolio in a beautifully modern way. Turn your visitors in to clients.</p>
                    <ul class="question-stack">
                        <li class="feature-item">
                            <div class="feature-icon">
                                <span data-icon="&#xe03e;" class="icon"></span>
                            </div>
                            <div class="feature-content">
                                <h5>Universal & Responsive</h5>
                                <p>Sedna is universal and will look smashing on any device.</p>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="feature-icon">
                                <span data-icon="&#xe040;" class="icon"></span>
                            </div>
                            <div class="feature-content">
                                <h5>User Centric Design</h5>
                                <p>Sedna takes advantage of common design patterns, allowing for a seamless experience for users of all levels.</p>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="feature-icon">
                                <span data-icon="&#xe03c;" class="icon"></span>
                            </div>
                            <div class="feature-content">
                                <h5>Clean reusable code</h5>
                                <p>Download and re-use the Sedna open source code for any other project you like.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="device-showcase">
        <div class="devices">
            <div class="ipad-wrap wp1"></div>
            <div class="iphone-wrap wp2"></div>
        </div>
    </div>
    <div class="responsive-feature-img"><img src="{{$url_css_js}}img/devices.png" alt="responsive devices"></div>
</section>
<section class="question-extra section-padding" id="assets">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="feature-list">
                    <h3>Designed with Sketch!</h3>
                    <p>Easily change/switch/swap every placeholder inside every image on Sedna with the included Sketch files. You’ll have this template customised to suit your business in no time! </p>
                    <p>Nam vehicula malesuada lectus, interdum fringilla nibh. Duis aliquam vitae metus a pharetra. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fermentum augue quis augue ornare, eget faucibus felis pharetra. Proin condimentum et leo quis fringilla.
                    </p>
                    <a href="#" class="btn btn-ghost btn-accent btn-small">What's Sketch?</a>
                </div>
            </div>
        </div>
    </div>
    <div class="macbook-wrap wp3"></div>
    <div class="responsive-feature-img"><img src="{{$url_css_js}}img/macbook-pro.png" alt="responsive devices"></div>
</section>
<section class="hero-strip section-padding">
    <div class="container">
        <div class="col-md-12 text-center">
            <h2>
                Customise Sedna with the included <span class="sketch">Sketch <i class="version">3</i></span> file
            </h2>
            <p>Change/swap/edit every aspect of Sedna before you hit development with the included Sketch file.</p>
            <a href="#" class="btn btn-ghost btn-accent btn-large">Download now!</a>
            <div class="logo-placeholder floating-logo"><img src="{{$url_css_js}}img/sketch-logo.png" alt="Sketch Logo"></div>
        </div>
    </div>
</section>
<section class="blog-intro section-padding" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Showcase your smashing product with Sedna</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 leftcol">
                <h5>EXCLUSIVE TO CODROPS</h5>
                <p>Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 rightcol">
                <h5>SPREADING PIXELS AROUND THE WORLD</h5>
                <p>Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </div>
</section>
<section class="blog text-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <article class="blog-post">
                    <figure>
                        <a href="img/blog-img-01.jpg" class="single_image">
                            <div class="blog-img-wrap">
                                <div class="overlay">
                                    <i class="fa fa-search"></i>
                                </div>
                                <img src="{{$url_css_js}}img/blog-img-01.jpg" alt="Sedna blog image"/>
                            </div>
                        </a>
                        <figcaption>
                            <h2><a href="#" class="blog-category" data-toggle="tooltip" data-placement="top" data-original-title="See more posts">Product</a></h2>
                            <p><a href="#" class="blog-post-title">Getting started with Sedna <i class="fa fa-angle-right"></i></a></p>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="col-md-4">
                <article class="blog-post">
                    <figure>
                        <a href="img/blog-img-02.jpg" class="single_image">
                            <div class="blog-img-wrap">
                                <div class="overlay">
                                    <i class="fa fa-search"></i>
                                </div>
                                <img src="{{$url_css_js}}img/blog-img-02.jpg" alt="Sedna blog image"/>
                            </div>
                        </a>
                        <figcaption>
                            <h2><a href="#" class="blog-category" data-toggle="tooltip" data-placement="top" data-original-title="See more posts">Technology</a></h2>
                            <p><a href="#" class="blog-post-title">Why IE8 support is deminishing <i class="fa fa-angle-right"></i></a></p>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="col-md-4">
                <article class="blog-post">
                    <figure>
                        <a href="img/blog-img-03.jpg" class="single_image">
                            <div class="blog-img-wrap">
                                <div class="overlay">
                                    <i class="fa fa-search"></i>
                                </div>
                                <img src="{{$url_css_js}}img/blog-img-03.jpg" class="single_image" alt="Sedna blog image"/>
                            </div>
                        </a>
                        <figcaption>
                            <h2><a href="#" class="blog-category" data-toggle="tooltip" data-placement="top" data-original-title="See more posts">Product</a></h2>
                            <p><a href="#" class="blog-post-title">Sedna tutorial: How to begin your <i class="fa fa-angle-right"></i></a></p>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <a href="#" class="btn btn-ghost btn-accent btn-small">More news</a>
        </div>
    </div>
</section>
<section class="testimonial-slider section-padding text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <div class="avatar"><img src="{{$url_css_js}}img/avatar.jpg" alt="Sedna Testimonial Avatar"></div>
                            <h2>"Lorem ipsum dolor sit amet, nullam lucia nisi."</h2>
                            <p class="author">Peter Finlan, Product Designer.</p>
                        </li>
                        <li>
                            <div class="avatar"><img src="{{$url_css_js}}img/mani.jpg" alt="Sedna Testimonial Avatar"></div>
                            <h2>"Nunc vel maximus purus. Nullam ac urna ornare."</h2>
                            <p class="author">Manoela Ilic, Founder @ Codrops.</p>
                        </li>
                        <li>
                            <div class="avatar"><img src="{{$url_css_js}}img/130.jpg" alt="Sedna Testimonial Avatar"></div>
                            <h2>"Nullam ac urna ornare, ultrices nisl ut, lacinia nisi."</h2>
                            <p class="author">Blaz Robar, Pixel Guru</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sign-up section-padding text-center" id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3>Get started with Sedna, absolutely free</h3>
                <p>Grab your copy today, exclusively from Codrops</p>
                <form class="signup-form" action="auth/login" method="POST" role="form">
                        {{ csrf_field() }}
                    <div class="form-input-group">
                        <i class="fa fa-envelope"></i><input type="text" name="email" class="" placeholder="E-mail Adresinizi Girin" required>
                    </div>
                    <div class="form-input-group">
                        <i class="fa fa-lock"></i><input type="password" name="password" class="" placeholder="Şifrenizi Girin" required>
                    </div>
                    <button type="submit" class="btn-fill sign-up-btn">GİRİŞ YAP</button>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="to-top">
    <div class="container">
        <div class="row">
            <div class="to-top-wrap">
                <a href="#top" class="top"><i class="fa fa-angle-up"></i></a>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="social-share">
                <p>BİZİ ARKADAŞLARINIZLA PAYLAŞIN</p>
                <a href="https://twitter.com/peterfinlan" class="twitter-share"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook-share"><i class="fa fa-facebook"></i></a>
             </div>
            <div class="col-md-7">
                <div class="footer-links">
                    <ul class="footer-group">
                        <li><a href="#">HAKKINDA</a></li>
                        <li><a href="#">GİZLİLİK</a></li>
                        <li><a href="#">İLETİŞİM</a></li>
                    </ul>
                    <p>Copyright © 2015 <a href="http://www.havelsan.com.tr" target="_blank">Havelsan A.Ş.</a><br></p>
                </div>
            </div>
            <div class="social-share">
                <p>Share Sedna with your friends</p>
                <a href="https://twitter.com/peterfinlan" class="twitter-share"><i class="fa fa-twitter"></i></a> <a
                        href="https://www.facebook.com/pages/Codrops/159107397912" class="facebook-share"><i
                            class="fa fa-facebook"></i></a>
            </div>
        </div>
    </div>
</footer>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="{{$url_css_js}}js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="{{$url_css_js}}bower_components/retina.js/dist/retina.js"></script>
<script src="{{$url_css_js}}js/jquery.fancybox.pack.js"></script>
<script src="{{$url_css_js}}js/vendor/bootstrap.min.js"></script>
<script src="{{$url_css_js}}js/scripts.js"></script>
<script src="{{$url_css_js}}js/jquery.flexslider-min.js"></script>
<script src="{{$url_css_js}}bower_components/classie/classie.js"></script>
<script src="{{$url_css_js}}bower_components/jquery-waypoints/lib/jquery.waypoints.min.js"></script>
<!-- For the demo ad only -->
<script src="http://tympanus.net/codrops/adpacks/demoad.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        //buraya login olunan kullanıcının ismini alıp (başarılı bir login gerçekleşmişse):
        // 1) header'daki Kayıt Ol butonunu Çıkış ile değiştiren ve Giriş butonunu login olunan kullanıcı adı yapan,
        // 2) Kullanıcı adına tıklandığında profil düzenleme sayfasını açan,
        // 3) Giriş yapıldıktan sonra sayfanın en altında bulunan form kısmını hidden yapan,
        // 4) Çıkış butonuna basıldığında sayfanın ilk haline geri getiren script gelecek.
        $user_auth = {{Auth::Check()}} +""

        if ($user_auth) {
            $user_name = "<?php if (Auth::check()) {
                echo Auth::user()->name;
            } ?>";
            $user_id = "<?php if (Auth::check()) {
                echo Auth::user()->id;
            } ?>";
            $("li#users a").html($user_name);
            $("li#users a").attr("href", "/profile/" + $user_id);
            $("li#logout a").html("Çıkış Yap");
            $("li#logout a").attr("href", "/auth/logout");
            $("#login").hide();
        }
    });
</script>
</body>
</html>