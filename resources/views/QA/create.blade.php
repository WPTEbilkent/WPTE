<?php

if($_POST)
    print_r($_POST);
$tags = \App\tags::lists('name','id')
?>


<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

{!! Form::open(array('route' => 'QA.store', 'class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('Başlık :') !!}
    {!! Form::text('title', null, array('required', 'class'=>'form-control', 'placeholder'=>'Başlık')) !!}
</div>
<div class="form-group">

    {!! Form::label('Etiket :') !!}
    {!! Form::select('tag_id', $tags)!!}
</div>
<div class="form-group">
    {!! Form::label('Your Message') !!}
    {!! Form::textarea('message', null, array('required',  'class'=>'form-control',  'placeholder'=>'Your message')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Submit!',  array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}