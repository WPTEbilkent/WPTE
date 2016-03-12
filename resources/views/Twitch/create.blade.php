<?php

{!! Form::open(array('route' => 'twitch.store', 'class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('Twitch URL: ') !!}
    {!! Form::text('url', null, array('required', 'class'=>'form-control', 'placeholder'=>'www.twitch.tv/username')) !!}
</div>
<div class="form-group">
    {!! Form::submit('Submit!',  array('class'=>'btn btn-primary')) !!}
</div>
    {!! Form::close() !!}