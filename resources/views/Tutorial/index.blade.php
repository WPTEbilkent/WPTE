@extends('layouts.masterTutorial')
@extends('HeadFoot')
@section('content')

    <script type="text/javascript">
        $(document).ready(function () {
            var input = "";
            var url = "";

            $('#searchButton').click(function () {
                input = "";
                url = "";
                input = $('#searchText').val();
                if (!input.length > 0) {
                    input = "null";
                }
                url = "{!! url('/tutorial/search') !!}" + "/" + input;
                ajax(url);
            });
            $('.searchTag').click(function () {
                input = "";
                url = "";
                input = $(this).html();
                url = "{!! url('/tutorial/search') !!}" + "/" + input;
                ajax(url);
            });


        });
        function ajax(url) {
            $.get(url, function (tutorials) {
                $("#TutorialContent").html(tutorials);
            });
        }

    </script>



    <section class="col-md-8" id="TutorialContent">
        @foreach($tutorials as $item)
            <?php
            $tags = explode(',', $item->tags);
            ?>
            <article class="blog-item">
                <div class="row">
                    <div class="col-md-9">
                        <p>
                            in
                            <a href="html5-templates.html">

                                {{ $item->user->name }}
                            </a>
                            ,
                            @foreach($tags as $tag)
                                <a href="#" class="searchTag">{{$tag}}</a>
                            @endforeach
                            <time>{{$item->date}}</time>
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

            <a class="btn btn-large btn-success" href="{{ URL::to('/tutorial/create') }}">Create a New Tutorial</a>


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
