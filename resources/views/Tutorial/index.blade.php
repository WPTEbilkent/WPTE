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

    <div id="QAContent">
        <div class="row row-no-padding-hor theme-gray ui-light">
            <div class="col-12">
                <div class="fixed">
                    <div class="row row-no-padding-ver">
                        <div class="col-8 xs-responsive">
                            <h4 class="align-left xs-align-center theme-night ui-text margin-5-v">Eğitim</h4>
                        </div>
                        <div class="col-4 xs-responsive align-right">
                            <a class="btn btn-responsive rounded theme-youtestify ui-dark ease-bg"
                               href="{{ URL::to('/tutorial/create') }}">Yeni Bir Soru Sorun</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed padding-20-v">
            <div class="row">
                <div class="col-8">
                    @foreach($tutorials as $item)
                        <?php
                        $tags = explode(',', $item->tags);
                        ?>
                        <div class="portlet rounded bordered light-bordered">
                            <div class="content-side padding-15">
                                <span class="dark x-large">By:</span> <a class="x-large link-default ease-link"
                                                                         href="{{url('/profile')}}/{{$item->user->id}}">{{$item->user->name}}</a>
                                <div class="sp10"></div>
                                <a class="question-link ease-color" href="#"><?php
                                    //title and the destination with parameters
                                    echo link_to_action('TutorialController@show', $title = $item->title, $parameters = array('pid' => $item->id), $attributes = array('class' => 'question-link ease-color'));
                                    ?></a>
                            </div>
                            <div class="content-side padding-15 theme-gray ui-x-light">
                                <div class="row row-no-padding">
                                    <div class="col-6 xs-align-center xs-responsive">
                                        @foreach($tags as $tag)
                                            <a class="btn btn-xs padding-10-h circle ease-bg searchTag"
                                               href="#">{{$tag}}</a>
                                        @endforeach
                                    </div>
                                    <div class="col-6 align-right xs-align-center dark small padding-5-v xs-responsive">
                                        <i class="fa fa-calendar-o margin-5-r"></i> {{$item->date}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <?php if(isset($content_search)) { ?>
                    @foreach($content_search as $item)
                        <?php
                        $tags = explode(',', $item->tags);
                        ?>
                        <div class="portlet rounded bordered light-bordered">
                            <div class="content-side padding-15">
                                <span class="dark x-large">By:</span> <a class="x-large link-default ease-link"
                                                                         href="{{url('/profile')}}/{{$item->user->id}}">{{$item->user->name}}</a>
                                <div class="sp10"></div>
                                <a class="question-link ease-color" href="#"><?php
                                    //title and the destination with parameters
                                    echo link_to_action('QAController@show', $title = $item->title, $parameters = array('pid' => $item->id), $attributes = array('class' => 'question-link ease-color'));
                                    ?></a>
                            </div>
                            <div class="content-side padding-15 theme-gray ui-x-light">
                                <div class="row row-no-padding">
                                    <div class="col-6 xs-align-center xs-responsive">
                                        @foreach($tags as $tag)
                                            <a class="btn btn-xs padding-10-h circle ease-bg searchTag"
                                               href="#">{{$tag}}</a>
                                        @endforeach
                                    </div>
                                    <div class="col-6 align-right xs-align-center dark small padding-5-v xs-responsive">
                                        <i class="fa fa-calendar-o margin-5-r"></i> {{$item->date}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <?php }?>

                    <?php if(isset($title_search)) { ?>
                    @foreach($title_search as $item)
                        <?php
                        $tags = explode(',', $item->tags);
                        ?>
                        <div class="portlet rounded bordered light-bordered">
                            <div class="content-side padding-15">
                                <span class="dark x-large">By:</span> <a class="x-large link-default ease-link"
                                                                         href="{{url('/profile')}}/{{$item->user->id}}">{{$item->user->name}}</a>
                                <div class="sp10"></div>
                                <a class="question-link ease-color" href="#"><?php
                                    //title and the destination with parameters
                                    echo link_to_action('QAController@show', $title = $item->title, $parameters = array('pid' => $item->id), $attributes = array('class' => 'question-link ease-color'));
                                    ?></a>
                            </div>
                            <div class="content-side padding-15 theme-gray ui-x-light">
                                <div class="row row-no-padding">
                                    <div class="col-6 xs-align-center xs-responsive">
                                        @foreach($tags as $tag)
                                            <a class="btn btn-xs padding-10-h circle ease-bg searchTag"
                                               href="#">{{$tag}}</a>
                                        @endforeach
                                    </div>
                                    <div class="col-6 align-right xs-align-center dark small padding-5-v xs-responsive">
                                        <i class="fa fa-calendar-o margin-5-r"></i> {{$item->date}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <?php }?>

                    <?php if(isset($user_search)) { ?>
                    @foreach($user_search as $item)
                        <?php
                        $tags = explode(',', $item->tags);
                        ?>
                        <div class="portlet rounded bordered light-bordered">
                            <div class="content-side padding-15">
                                <span class="dark x-large">By:</span> <a class="x-large link-default ease-link"
                                                                         href="{{url('/profile')}}/{{$item->user->id}}">{{$item->user->name}}</a>
                                <div class="sp10"></div>
                                <a class="question-link ease-color" href="#"><?php
                                    //title and the destination with parameters
                                    echo link_to_action('QAController@show', $title = $item->title, $parameters = array('pid' => $item->id), $attributes = array('class' => 'question-link ease-color'));
                                    ?></a>
                            </div>
                            <div class="content-side padding-15 theme-gray ui-x-light">
                                <div class="row row-no-padding">
                                    <div class="col-6 xs-align-center xs-responsive">
                                        @foreach($tags as $tag)
                                            <a class="btn btn-xs padding-10-h circle ease-bg searchTag"
                                               href="#">{{$tag}}</a>
                                        @endforeach
                                    </div>
                                    <div class="col-6 align-right xs-align-center dark small padding-5-v xs-responsive">
                                        <i class="fa fa-calendar-o margin-5-r"></i> {{$item->date}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <?php }?>
                    <!-- pagination -->
                    <div class="pagination align-center">
                        <?php
                        $rend = $tutorials->render();
                        if (isset($content_search)) { echo $content_search->render(); }
                        if (isset($title_search)) { echo $title_search->render(); }
                        if (isset($user_search)) { echo $user_search->render(); }
                        $rend = str_replace("<a", '<a class="btn circle ease-bg"', $rend);
                        $rend = str_replace('<li class="disabled"><span', '<li class="disabled"><span class="btn large prev circle ease-bg"', $rend);
                        $rend = str_replace('<li class="active"><span', '<li class="active"><span class="btn btn-active circle ease-bg theme-youtestify ui-dark"', $rend);
                        $rend = str_replace('<li class="disabled">', ' ', $rend);
                        $rend = str_replace('<li class="active">', ' ', $rend);
                        $rend = str_replace('<li>', ' ', $rend);
                        $rend = str_replace("</li>", ' ', $rend);
                        echo $rend;
                        ?>
                    </div>
                </div>
                @stop

                {{--@section('sidebar')--}}
                {{--@endsection()--}}
            </div>
        </div>
    </div>
{{--@stop--}}