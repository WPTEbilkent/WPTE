@extends('layouts.masterQAPage')
@extends('HeadFoot')
@section('content')


            <!-- blog-contents -->
<script src="/laravel/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/laravel/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script type="text/javascript">
    $(function(){
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

                    <div class="alert alert-success">
                        <a href="http://themewagon.com">Free HTML5 Website Templates </a>
                    </div>

                    <div class="list-item">
                        <h3>Avada-Plus - A Free Responsive HTML5 Agency Template</h3>
                        <p>
                            Avada Plus is responsive, we’ve used the most powerful CSS framework Bootstrap and it’s latest stable version of Bootstrap 3 to make this free responsive html5 agency template.
                        </p>
                        <div class="item-info text-center">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <img class="img-responsive center-block" src="../../resources/assets/img/corporate.jpg" alt="Item number 1">
                                    <a class="btn btn-success" target="_blank" href="http://technext.github.io/avada-plus/" >Demo</a>
                                    <a class="btn btn-danger" target="_blank" href="http://themewagon.com/themes/avada-plus-free-responsive-html5-agency-template/" >More Info</a>
                                </div>
                            </div>
                        </div> <!-- end of /.item-info -->
                    </div> <!-- end of /.list-item -->

                    <!--<div class="list-item">
                        <div class="badge">
                            <h3>Question Title will be placed here</h3>
                        </div>

                        <div class="blog-item">
                            Question content will be placed here
                        </div>

                        <div class="blog-item">
                            <p>This section will be populated for the given answers</p>
                        </div>

                    </div> --><!-- end of /.list-item -->

                <div class="feedback">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>{{$question->title}}</h1>
                            <div class="cmnt-clipboard"><span class="btn-clipboard">Reply</span></div>
                            <div class="well">
                                <div class="row">
                                    <div class="col-md-2">
                                        {{$question->rate}}
                                    </div>
                                    <div class="col-md-10">
                                        <p class="comment-info">
                                            <strong>
                                                <?php
                                                    $user=App\user::find($question->user_id);
                                                ?>
                                                {{$user->name}}
                                            </strong>
                                            <span>{{$question->date}}</span>
                                        </p>
                                        {!! $question->question !!}
                                    </div>
                                </div>
                                <?php
                                $tags = explode(",",$question->tags);
                                ?>
                                <h3 style="margin-left: 17%">
                                @foreach($tags as $tag)
                                    <span class="label label-default" >{{$tag}}</span>
                                @endforeach
                                </h3>
                            </div>
                        </div>
                    </div>



                    <br><br>
                    @foreach($answers as $answer)
                        <?php
                        $user=App\user::find($answer->user_id);
                        ?>
                    <div class="well">
                        <div class="row">
                            <div class="col-md-2">
                                {{$answer->rate}}
                            </div>
                            <div class="col-md-10">
                                <p class="comment-info">
                                    <strong>{{$user->name}}</strong> <span>{{$answer->date}}</span>
                                </p>
                                    {!! $answer->answer !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {!! Form::open(array('action' => 'QAController@newAnswer' , 'class' => 'form')) !!}
                    <div class="form-group">
                        {!! Form::hidden('q_id', $question->id) !!}
                        {!! Form::textarea('message', null, array('id' => 'ata', 'required',  'class'=>'form-control',  'placeholder'=>'Cevap Yaziniz')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Submit',  array('class'=>'btn btn-primary')) !!}
                    </div>
                    {!! Form::close() !!}

                </div>

                </article>

                <h4>Related Question titles will be placed here</h4>
                <div class="related-articles">
                    <div class="alert alert-info">
                        <a href="related question link will come here"> This area will be populated for related question links with a maximum row count of 5 </a>
                    </div>
                </div>



            </section>
            <!-- end of blog-contents -->




@endsection