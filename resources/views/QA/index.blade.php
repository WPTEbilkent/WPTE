@extends('layouts.masterQA')
@extends('HeadFoot')
@section('content')

    <script type="text/javascript">
        $( document ).ready(function() {
            var input="";
            var url="";

            $('#searchButton').click(function() {
                input="";
                url="";
                input = $('#searchText').val();
                if(!input.length > 0){
                    input = "null";
                }
                url =  "{!! url('/QA/search') !!}" +"/" + input;
                ajax(url);
            });
            $('.searchTag').click(function() {
                input="";
                url="";
                input = $(this).html();
                url =  "{!! url('/QA/search') !!}" +"/" + input;
                ajax(url);
            });




        });
        function ajax(url){
            $.get(url, function (question) {
                $("#QAContent").html(question);
            });
        }

    </script>

    <section class="col-md-8" id="QAContent">

        @foreach($questions as $item)
            <?php
            $tags = explode(',', $item->tags);
            ?>


            <article class="blog-item">
                <div class="row">

                    <div class="col-md-9">
                        <p>
                            in
                            <a href="html5-templates.html">{{$item->title}}</a>
                            ,
                            @foreach($tags as $tag)
                                <a href="#" class="searchTag">{{$tag}}</a>
                            @endforeach


                            <time>{{$item->date}}
                            </time>
                        </p>
                        <h1>
                            <?php
                            //title and the destination with parameters
                            echo link_to_action('QAController@show', $title = $item->title, $parameters = array('pid' => $item->id), $attributes = array());
                            ?>
                        </h1>
                    </div>
                </div>
            </article>
            @endforeach


                    <!-- blog-contents -->
            <a href="{{ URL::to('/QA/create') }}">Create a New QA</a>
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
                                <?php echo $questions->render()?>
                            </ul> <!-- /.pagination -->
                        </nav>
                    </div>
                </div>
            </div> <!-- /.page-turn -->

    </section>
    <!-- end of blog -->


@stop
