@extends('layouts.masterQAPage')
@extends('HeadFoot')

@section('content')

        <!-- blog-contents -->
<script type="text/javascript">
    $(function () {
        $('#ata').ckeditor();
    });

    function addVote(qa_id, content, vote, creator_id) {
        @if(Auth::guest())
                window.location = "/auth/login";
        @endif
                url = "{!! url('/vote') !!}" + "?content_id=" + qa_id + "&content=" + content + "&vote=" + vote + "&creator_id=" + creator_id;
        ajax(url);
    }

    function ajax(url) {
        $.get(url, function (response) {
            if (response[0]["message"]) {
                alert(response[0]["message"]);
            } else {
                document.getElementById(response[0]["div_id"]).innerHTML = response[0]["vote"]
            }

        });
    }
</script>
<div class="row row-no-padding-hor theme-gray ui-light">
    <div class="col-12">
        <div class="fixed">
            <div class="row row-no-padding-ver">
                <div class="col-12 xs-responsive">
                    <h4 class="align-left xs-align-center theme-night ui-text margin-5-v">{{$question->title}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="fixed padding-20-v">
    <div class="row">
        <div class="portlet rounded bordered light-bordered">
            <div class="col-static no-responsive ">
                <div class="static-100 padding-10 right-bordered light-bordered theme-gray ui-x-light">
                    <div class="rate">
                        <button class="btn xx-large rounded bordered shadow theme-white ui-light ease-bg" type="button"
                                title="Up"
                                onClick="addVote('{!! $question->id !!}', 'question', '1', '{!! $question->user_id !!}' )">
                            <i class="dark fa fa-angle-up"></i></button>
                        <span id="vote_question_{!! $question->id !!}" class="dark xx-large">{{$question->vote}}</span>
                        <button class="btn xx-large rounded bordered shadow theme-white ui-light ease-bg" type="button"
                                title="Down"
                                onClick="addVote('{!! $question->id !!}', 'question', '-1', '{!! $question->user_id !!}' )">
                            <i class="dark fa fa-angle-down"></i></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 padding-15">

                        <span class="dark x-large">By:</span> <a class="x-large link-default ease-link"
                                                                 href="#"> {{$user= $question->user->name}}</a>
                        <div class="sp10"></div>
                        {!! $question->question !!}
                        <div class="row row-no-padding-ver">
                            <div class="col-6 xs-align-center xs-responsive">
                                <?php
                                $tags = explode(",", $question->tags);
                                ?>
                                @foreach($tags as $tag)
                                    <span class="btn btn-xs padding-10-h margin-5-b circle ease-bg">{{$tag}}</span>
                                @endforeach
                            </div>
                            <div class="col-6 align-right xs-align-center dark small padding-5-v xs-responsive">
                                <i class="fa fa-calendar-o margin-5-r"></i> {{$question->date}}
                            </div>
                        </div>
                    </div>
                    @if(!Auth::guest())
                        @if(Auth::user()->isAdmin() || Auth::user()->id == $question->user_id)
                            <a href="{{ route('QA.edit', $question->id) }}">edit</a>
                            {!! Form::open([ 'method' => 'DELETE','route' => ['QA.destroy', $question->id]]) !!}
                            {!! Form::submit('Delete this task?', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endif
                    @endif
                </div>
            </div>
        </div>
        @foreach($answers as $answer)
            <?php
            $comments = $answer->comments;
            ?>
            <div class="portlet rounded bordered light-bordered">
                <div class="col-static no-responsive ">
                    <div class="static-100 padding-10 right-bordered light-bordered theme-gray ui-x-light">
                        <div class="rate">
                            <button class="btn xx-large rounded bordered shadow theme-white ui-light ease-bg"
                                    type="button"
                                    title="Up" onClick="addVote('{!! $answer->id !!}', 'q_answer', '1',  '{!! $answer->user_id !!}'  )"><i
                                        class="dark fa fa-angle-up"></i></button>
                            <span class="dark xx-large" id="vote_q_answer_{!! $answer->id !!}">{{$answer->vote}}</span>
                            <button class="btn xx-large rounded bordered shadow theme-white ui-light ease-bg"
                                    type="button"
                                    title="Down" onClick="addVote('{!! $answer->id !!}', 'q_answer', '-1',  '{!! $answer->user_id !!}'  )"><i
                                        class="dark fa fa-angle-down"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 padding-15">

                            <span class="dark x-large">By:</span> <a class="x-large link-default ease-link"
                                                                     href="#">{{$answer->user->name}}</a>
                            <div class="sp10"></div>
                            {{$answer->answer}}
                            <div class="row row-no-padding-ver">
                                <div class="col-6 xs-align-center xs-responsive"></div>
                                <div class="col-6 align-right xs-align-center dark small padding-5-v xs-responsive">
                                    <i class="fa fa-calendar-o margin-5-r"></i> {{$answer->date}}
                                </div>
                            </div>

                            <div class="portlet padding-10 margin-15-t rounded theme-gray ui-x-light">
                                {!! Form::open(array('action' => 'QAController@newComment' , 'class' => 'form')) !!}
                                <div class="textarea margin-15-b rounded bordered light-bordered ease-form"
                                     data-counter="2000">
                                    {!! Form::hidden('a_id', $answer->id)!!}
                                    {!! Form::textarea('comment', null, array('id' => 'cmnt', 'required',  'class'=>'form-control',  'placeholder'=>'Yorum Yazın')) !!}
                                </div>

                                <div class="content-side padding-10-b">
                                    <div class="row row-no-padding">
                                        <div class="col-6 padding-5-v md-align-center">
                                            <strong>Yorumlar</strong>
                                        </div>
                                        <div class="col-6 align-right md-align-center">
                                            {!! Form::submit('Yorum Ekleyin',  array('class'=>'btn btn-sm btn-responsive rounded theme-night ui-dark ease-bg')) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                                @if(!$comments->isEmpty())
                                    @foreach($comments as $comment)
                                        <blockquote>
                                            <p>{{$comment->comment}}</p>
                                            <footer><span class="dark">By:</span> <a class="dark link-default ease-link"
                                                                                     href="#">{{$comment->user->name}}</a>
                                                <cite
                                                        title="Source Title">{{$comment->date}}</cite></footer>
                                        </blockquote>
                                    @endforeach
                                @else
                                    <blockquote>
                                        <cite>Henüz yorum yapılmamış</cite>
                                    </blockquote>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="xx-large margin-15-b">Cevabınız</div>
        <div class="textarea margin-15-b rounded bordered light-bordered dual-bordered ease-form">
            {!! Form::open(array('action' => 'QAController@newAnswer' , 'class' => 'form')) !!}
            {!! Form::hidden('q_id', $question->id) !!}
            {!! Form::textarea('message', null, array('id' => 'ata', 'required',  'class'=>'',  'placeholder'=>'Cevap Yazin')) !!}
        </div>
        <div class="md-align-center">
            {!! Form::submit('Cevabınızı Kaydedin',  array('class'=>'btn btn-responsive rounded theme-youtestify ui-dark ease-bg')) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection