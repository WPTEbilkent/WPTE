@extends('layouts.masterQAPage')
@extends('HeadFoot')
@section('content')
    <?php
    //extract($_GET);
    //echo $pid;
    ?>


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
                            <h1>Question Title Will Be Placed Here</h1>
                            <div class="cmnt-clipboard"><span class="btn-clipboard">Reply</span></div>
                            <div class="well">
                                <div class="row">
                                    <div class="col-md-2">
                                        Rate system will be placed here
                                    </div>
                                    <div class="col-md-10">
                                        <p class="comment-info">
                                            <strong>User Name Will Be Placed Here</strong> <span>22 april 2015</span>
                                        </p>
                                        <p>
                                            Question content will be placed here
                                        </p>
                                    </div>
                                </div>
                                <h3><span class="label label-default" style="margin-left: 17%">Question Tags Will Be Placed Here</span></h3>
                            </div>
                        </div>
                    </div>



                    <br><br>
                    <div class="well">
                        <div class="row">
                            <div class="col-md-2">
                                Rate system will be placed here
                            </div>
                            <div class="col-md-10">
                                <p class="comment-info">
                                    <strong>User Name Will Be Placed Here</strong> <span>22 april 2015</span>
                                </p>
                                <p>
                                    Answer content will be placed here
                                </p>

                            </div>
                        </div>
                    </div>
                  <textarea id="ata"></textarea>

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