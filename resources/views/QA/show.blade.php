@extends('layouts.masterQAPage')
@extends('HeadFoot')
@section('content')

        <!-- blog-contents -->
<script type="text/javascript">
    $(function () {
        $('#ata').ckeditor();
    });

    function addVote(qa_id, content, vote) {
        @if(Auth::guest())
                window.location = "/auth/login";
        @endif
                url = "{!! url('/vote') !!}" + "?content_id=" + qa_id + "&content=" + content + "&vote=" + vote;
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

<section class="col-md-11">
    <div class="feedback">
        <div class="row">
            <div class="col-md-12">
                <h1>{{$question->title}}</h1>
                <div class="well">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="btn-votes">
                                <input type="button" title="Up" class="up"
                                       onClick="addVote('{!! $question->id !!}', 'question', '1' )"/>
                                <div id="vote_question_{!! $question->id !!}"
                                     class="label-votes">{{$question->vote}}</div>
                                <input type="button" title="Down" class="down"
                                       onClick="addVote('{!! $question->id !!}', 'question', '-1' )"/>
                            </div>
                            <a href="{{ route('QA.edit', $question->id) }}">edit</a>

                            {!! Form::open([ 'method' => 'DELETE','route' => ['QA.destroy', $question->id]]) !!}
                            {!! Form::submit('Delete this task?', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-10">
                            <p class="comment-info">
                                <strong>
                                    {{$user= $question->user->name}}
                                </strong>
                                <span>{{$question->date}}</span>
                            </p>
                            {!! $question->question !!}
                        </div>
                    </div>
                    <?php
                    $tags = explode(",", $question->tags);
                    ?>
                    <h3 style="margin-left: 17%">
                        @foreach($tags as $tag)
                            <span class="label label-default">{{$tag}}</span>
                        @endforeach
                    </h3>
                </div>
            </div>
        </div>
        <br><br>
        @foreach($answers as $answer)
            <?php
            $comments = $answer->comments;
            ?>
            <div class="well">
                <div class="row">
                    <div class="col-md-1">
                        <div class="btn-votes">
                            <input type="button" title="Up" class="up"
                                   onClick="addVote('{!! $answer->id !!}', 'q_answer', '1' )"/>
                            <div id="vote_q_answer_{!! $answer->id !!}" class="label-votes">{{$answer->vote}}</div>
                            <input type="button" title="Down" class="down"
                                   onClick="addVote('{!! $answer->id !!}', 'q_answer', '-1' )"/>
                        </div>
                    </div>
                    {{--<div class="col-md-2">--}}
                    {{--{{$answer->rate}}--}}
                    {{--</div>--}}
                    <div class="col-md-10">
                        <div id="reply" class="cmnt-clipboard"><span class="btn-clipboard">Yorum</span></div>
                        <p class="comment-info">
                            <strong>{{$answer->user->name}}</strong> <span>{{$answer->date}}</span>
                        </p>
                        {!! $answer->answer !!}
                    </div>
                </div>
                <div class="well">
                    <div class="row">
                        <div class="col-md-offset-1">
                            <?php
                            if ($comments) {
                                foreach ($comments as $comment) {
                                    echo "<div class='col-md-10'>";
                                    echo "<p class=comment-info>";
                                    echo "'<strong>";
                                    echo $comment->user->name;
                                    echo "</strong><span>'.$comment->date.'</span>'";
                                    echo "</p>";
                                    echo $comment->comment;
                                    echo "</div>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-offset-1">
                {!! Form::open(array('action' => 'QAController@newComment' , 'class' => 'form')) !!}
                <div class="form-group">
                    {!! Form::hidden('a_id', $answer->id) !!}
                    {!! Form::text('comment', null, array('id' => 'cmnt', 'required',  'class'=>'form-control',  'placeholder'=>'Yorum Yazın')) !!}
                </div>
                <div class="form-group col-md-offset-11">
                    {!! Form::submit('Submit',  array('class'=>'btn btn-primary')) !!}
                </div>
                {!! Form::close() !!}
            </div>
        @endforeach
    </div>
    <br><br>
    <div class="col-md-12">
        {!! Form::open(array('action' => 'QAController@newAnswer' , 'class' => 'form')) !!}
        <div class="form-group">
            {!! Form::hidden('q_id', $question->id) !!}
            {!! Form::textarea('message', null, array('id' => 'ata', 'required',  'class'=>'form-control',  'placeholder'=>'Cevap Yazin')) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Submit',  array('class'=>'btn btn-primary')) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <div class="related-articles">
        <h4>Related Question titles will be placed here</h4>
        <div class="alert alert-info">
            <a href="related question link will come here"> This area will be populated for related question links with
                a maximum row count of 5 </a>
        </div>
    </div>
</section>
<!-- end of blog-contents -->
@endsection