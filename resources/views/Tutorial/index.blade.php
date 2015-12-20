@extends('layouts.masterTutorial')
@extends('HeadFoot')
@section('content')


        <!-- blog-contents -->
<section class="col-md-8">
    <article class="blog-item">
        <div class="row">
            <div class="col-md-3">
                <a href="#">
                    <img src="../resources/assets/img/event.jpg" class="img-thumbnail center-block"
                         alt="Blog Post Thumbnail">
                </a>
            </div>
            <div class="col-md-9">
                <p>
                    in
                    <a href="html5-templates.html">html5</a>
                    ,
                    <a href="#">templates</a>
                    <time>23-july-2015
                        </time>
                </p>
                <h1>
                    <?php
                    //title and the destination with parameters
                    echo link_to_action('TutorialController@show', $title = "50+ best free responsive event template in 2015", $parameters = array('pid' => 123), $attributes = array());
                    ?>



                </h1>
            </div>
        </div>
    </article> <!-- /.blog-item -->
    <article class="blog-item">
        <div class="row">
            <div class="col-md-3">
                <a href="#">
                    <img src="../resources/assets/img/event.jpg" class="img-thumbnail center-block"
                         alt="Blog Post Thumbnail">
                </a>
            </div>
            <div class="col-md-9">
                <p>
                    in
                    <a href="html5-templates.html">html5</a>
                    ,
                    <a href="#">templates</a>
                    <time>23-july-2015
                        </time>
                </p>
                <h1>
                    <?php
                    //title and the destination with parameters
                    echo link_to_action('TutorialController@show', $title = "50+ best free responsive event template in 2015", $parameters = array('pid' => 123), $attributes = array());
                    ?>



                </h1>
            </div>
        </div>
    </article> <!-- /.blog-item -->
    <article class="blog-item">
        <div class="row">
            <div class="col-md-3">
                <a href="#">
                    <img src="../resources/assets/img/event.jpg" class="img-thumbnail center-block"
                         alt="Blog Post Thumbnail">
                </a>
            </div>
            <div class="col-md-9">
                <p>
                    in
                    <a href="html5-templates.html">html5</a>
                    ,
                    <a href="#">templates</a>
                    <time>23-july-2015
                        </time>
                </p>
                <h1>
                    <?php
                    //title and the destination with parameters
                    echo link_to_action('TutorialController@show', $title = "50+ best free responsive event template in 2015", $parameters = array('pid' => 123), $attributes = array());
                    ?>



                </h1>
            </div>
        </div>
    </article> <!-- /.blog-item -->
    <article class="blog-item">
        <div class="row">
            <div class="col-md-3">
                <a href="#">
                    <img src="../resources/assets/img/event.jpg" class="img-thumbnail center-block"
                         alt="Blog Post Thumbnail">
                </a>
            </div>
            <div class="col-md-9">
                <p>
                    in
                    <a href="html5-templates.html">html5</a>
                    ,
                    <a href="#">templates</a>
                    <time>23-july-2015
                        </time>
                </p>
                <h1>
                    <?php
                    //title and the destination with parameters
                    echo link_to_action('TutorialController@show', $title = "50+ best free responsive event template in 2015", $parameters = array('pid' => 123), $attributes = array());
                    ?>



                </h1>
            </div>
        </div>
    </article> <!-- /.blog-item -->
    <article class="blog-item">
        <div class="row">
            <div class="col-md-3">
                <a href="#">
                    <img src="../resources/assets/img/event.jpg" class="img-thumbnail center-block"
                         alt="Blog Post Thumbnail">
                </a>
            </div>
            <div class="col-md-9">
                <p>
                    in
                    <a href="html5-templates.html">html5</a>
                    ,
                    <a href="#">templates</a>
                    <time>23-july-2015
                        </time>
                </p>
                <h1>
                    <?php
                    //title and the destination with parameters
                    echo link_to_action('TutorialController@show', $title = "50+ best free responsive event template in 2015", $parameters = array('pid' => 123), $attributes = array());
                    ?>



                </h1>
            </div>
        </div>
    </article> <!-- /.blog-item -->

    <div class="page-turn">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <nav>
                    <ul class="pagination pagination-sm">
                        <li class="disabled">
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">Prev</span>
                            </a>
                        </li>
                        <li class="active"><a href="index.html">1</a></li>
                        <li><a href="page2.html">2</a></li>
                        <li><a href="page3.html">3</a></li>
                        <li><a href="page4.html">4</a></li>
                        <li><a href="page5.html">5</a></li>
                        <li>
                            <a href="page6.html" aria-label="Next">
                                <span aria-hidden="true">Next</span>
                            </a>
                        </li>
                    </ul> <!-- /.pagination -->
                </nav>
            </div>
        </div>
    </div> <!-- /.page-turn -->

</section>
<!-- end of blog -->
@stop
