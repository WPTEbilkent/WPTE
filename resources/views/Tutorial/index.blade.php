@extends('layouts.masterTutorial')
@extends('HeadFoot')
@section('content')

    <section class="col-md-8">
@foreach($tutorials as $item)
        <article class="blog-item">
            <div class="row">

                <div class="col-md-9">
                    <p>
                        in
                        <a href="html5-templates.html">{{ $item->publisher_id }}</a>
                        ,
                        <a href="#">{{$item->tag}}</a>
                        <time>{{$item->date}}
                        </time>
                    </p>
                    <h1>
                        <?php
                        //title and the destination with parameters
                        echo link_to_action('TutorialController@show', $title = $item->title, $parameters = array('pid' => $item->id), $attributes = array());
                        ?>
                    </h1>
                </div>
            </div>
        </article>


@endforeach


        <!-- blog-contents -->

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
                       <?php echo $tutorials->render()?>
                    </ul> <!-- /.pagination -->
                </nav>
            </div>
        </div>
    </div> <!-- /.page-turn -->

</section>
<!-- end of blog -->
@stop
