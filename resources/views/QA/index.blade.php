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
            $user = App\user::find($item->user_id);
            $tags = explode(',', $item->tags);
            ?>


            <article class="blog-item">
                <div class="row">

                    <div class="col-md-9">
                        <p>
                            By:
                            <a href="html5-templates.html">
                                {{$user->name}}

                            </a>
                            , Tags:
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

            <a class="btn btn-large btn-success" href="{{ URL::to('/QA/create') }}">Ask A Question!</a>

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
