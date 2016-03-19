@extends('layouts.masterQA')
@extends('HeadFoot')
@section('content')

    <script src="http://localhost/laravel/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="http://localhost/laravel/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#tutorialText').ckeditor();
        });
    </script>

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    <div class="col-md-12">
        <div class="col-md-8">
            {!! Form::open(array('route' => 'tutorial.store', 'class' => 'form')) !!}

            <div class="form-group", style="margin-top: 4%">
                {!! Form::label('Başlık :') !!}
                {!! Form::text('title', null, array('required', 'class'=>'form-control', 'placeholder'=>'Başlık')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Etiket :') !!}
                {!! Form::text('tags', null, array('required', 'class'=>'form-control', 'placeholder'=>'Etiket')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Sorunuz:') !!}
                {!! Form::textarea('message', null, array('id' => 'tutorialText', 'required',  'class'=>'form-control',  'placeholder'=>'Mesaj')) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit',  array('class'=>'btn btn-primary')) !!}
            </div>
            {!! Form::close() !!}
        </div>

        <div class="col-md-4" style="border: 1px solid red">
            This area is reserved to live title search results
        </div>


    </div>
@endsection