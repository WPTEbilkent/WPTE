@extends('layouts.masterQA')
@extends('HeadFoot')
@section('content')
    <head>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script type="text/javascript">
            $(function() {
                $( "#date" ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dayNames:[ "pazar", "pazartesi", "salı", "çarşamba", "perşembe", "cuma", "cumartesi" ],
                    dayNamesMin: [ "pa", "pzt", "sa", "çar", "per", "cum", "cmt" ],
                    monthNamesShort: [ "Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık" ],
                    nextText: "ileri",
                    prevText: "geri"
                });
            });
        </script>
    </head>


    <div id="QAContent">
        <div class="col-8">
            {!! Form::open(array('method' => 'PATCH' ,'route' => ['events.update', $oldEvent->id], 'class' => 'form') ) !!}
            <div class="form-group" , style="margin-top: 4%">
                {!! Form::label('Başlık :') !!}
                {!! Form::text('header', $oldEvent->header, array('required', 'class'=>'form-control', 'placeholder'=>'Başlık')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Tür :') !!}
                {!! Form::text('type', $oldEvent->type, array('id'=>'type', 'required', 'class'=>'form-control', 'placeholder'=>'Tür')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('URL :') !!}
                {!! Form::text('url', $oldEvent->url, array('id'=>'url', 'required', 'class'=>'form-control', 'placeholder'=>'URL')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Tarih :') !!}
                {!! Form::text('date', $oldEvent->date, array('id'=>'date', 'class'=>'form-control', 'placeholder'=>'Tarih')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Saat :') !!}
                {!! Form::text('time', $oldEvent->time, array('id'=>'time', 'class'=>'form-control', 'placeholder'=>'Saat')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Ülke :') !!}
                {!! Form::text('country', '', array('id'=>'country', 'class'=>'form-control', 'placeholder'=>'Ülke')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Şehir :') !!}
                {!! Form::text('city', '', array('id'=>'city', 'class'=>'form-control', 'placeholder'=>'Şehir')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Yer :') !!}
                {!! Form::text('location', $oldEvent->location, array('id'=>'place', 'class'=>'form-control', 'placeholder'=>'Yer')) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Degistir',
                  array('class'=>'btn btn-primary')) !!}
            </div>
            {!! Form::close() !!}

            <div class="content-side padding-15 theme-gray ui-x-light">
                <div class="row row-no-padding">
                    <div class="col-6 xs-align-center xs-responsive">
                        <span>Kaynak: {{$oldEvent->source}}</span>
                        <br>
                        <span>Kayıt Tarihi: {{$oldEvent->insert_date}}</span>
                        {{--<a class="x-large link-default ease-link"--}}
                        {{--href="{{url('/profile')}}/{{$item->user->id}}">{{$item->user->name}}</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection