@extends('layouts.masterQAPage')
@extends('HeadFoot')
@section('content')

        <!-- blog-contents -->
<script src="http://localhost/laravel/vendor/unisharp/laravel-ckeditor/ckeditor.js"
        xmlns="http://www.w3.org/1999/html"></script>
<script src="http://localhost/laravel/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script type="text/javascript">
    $(function () {
        $('#ata').ckeditor();
    });
</script>
<section class="col-md-11">
    <!-- TODO ->
    <!-- soru ve her cevap için rate gelecek, answers gelecek, answer butonu, butondan sonra açılacak olan text editörü
    <article class="single-blog-item">
        <div class="alert alert-info">
            <a href="index.html">home</a>,
            <a href="#">css3</a>,
            <a href="#">jquery</a>,
            <a href="#">tutorials</a>
            updated
            <time>july 30,2015</time>
        </div>
        <!-- end of /.list-item -->
    <div class="feedback">
        <div class="row">
            <div class="col-md-12">
                <h1>{{$question->title}}</h1>
                <div class="well">
                    <div class="row">
                        <div class="col-md-2">
                            {{$question->rate}}
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
                    <div class="col-md-2">
                        {{$answer->rate}}
                    </div>
                    <div class="col-md-10">
                        <div id="reply" class="cmnt-clipboard"><span class="btn-clipboard">Yorum</span></div>
                        <p class="comment-info">
                            <strong>{{$answer->user->name}}</strong> <span>{{$answer->date}}</span>
                        </p>
                        {!! $answer->answer !!}
                    </div>
                </div>
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