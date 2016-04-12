@extends('layouts.masterTwitch')
@extends('HeadFoot')
@section('content')



    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    {!! Form::open(array('route' => 'twitch.store', 'class' => 'form')) !!}

    <div class="form-group">
        {!! Form::label('Twitch URL: ') !!}
        {!! Form::text('url', null, array('required', 'class'=>'form-control', 'placeholder'=>'www.twitch.tv/username')) !!}
    </div>
    <div class="form-group" id="submit">
        {!! Form::submit('Submit!',  array('class'=>'btn btn-primary')) !!}
    </div>
    {!! Form::close() !!}

    <section class="col-md-8" id="">
        @foreach($twitches->all() as $twitch)
        <div class="single-blog-item">
            <span>
               <?php
                echo link_to_action('TwitchController@show', $title = $twitch->url, $parameters = array('pid' => $twitch->url), $attributes = array())
                ?>
            </span>
            <span>

            </span>
        </div>
        @endforeach


        <iframe
                src="http://player.twitch.tv/?channel=esl_csgo"
                height="720"
                width="1280"
                frameborder="0"
                scrolling="no"
                allowfullscreen="true">
        </iframe>

        <!-- blog-contents -->


    </section>
    <!-- end of blog -->
@stop