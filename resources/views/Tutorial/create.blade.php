@extends('layouts.masterQA')
@extends('HeadFoot')
@section('content')

    <script type="text/javascript">
        $(function(){
            $('#tutorialText').ckeditor();

            function split(val) {
                return val.split(/,\s*/);
            }

            $("#tags")
                    .bind("keydown", function (event) {
                        if (event.keyCode === $.ui.keyCode.TAB &&
                                $(this).autocomplete("instance").menu.active) {
                            event.preventDefault();
                        }
                    })
                    .autocomplete({
                        focus: function () {
                            // prevent value inserted on focus
                            return false;
                        },
                        source: function (request, response) {
                            var terms = $.trim(request.term).split(',');
                            if (terms.length == 0)
                                return;
                            var searchTerm = $.trim(terms[terms.length - 1]);
                            if (searchTerm.length == 0)
                                return;
                            $.getJSON("/tags?term=" + searchTerm, function (data) {
                                response($.map(data, function (value, key) {
                                    return {
                                        label: value.name,
                                        value: value.name
                                    };
                                }));
                            });
                        },
                        autoFocus: false,
                        minLength: 3,
                        select: function (event, ui) {
                            debugger;
                            var terms = split(this.value);
                            // remove the current input
                            terms.pop();
                            // add the selected item
                            terms.push(ui.item.value);
                            // add placeholder to get the comma-and-space at the end
                            terms.push("");
                            this.value = terms.join(", ");
                            return false;
                        }
                    });
        });

        $(document).ready(function () {

            $("#myBtn").click(function () {
                $('#myModal').modal('show');
            });
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
                {!! Form::text('tags', null, array('id'=>'tags', 'required', 'class'=>'form-control', 'placeholder'=>'Etiket')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Sorunuz:') !!}
                {!! Form::textarea('content', null, array('id' => 'tutorialText', 'required',  'class'=>'form-control',  'placeholder'=>'Mesaj')) !!}
            </div>

            <button id="myBtn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Fotoğraf Yükle</button>
            @if(Session::has('success'))
                <div class="alert-box success">
                    <h5>{!! Session::get('success') !!}</h5>
                </div>
            @endif

            <div class="form-group">
                {!! Form::submit('Submit',  array('class'=>'btn btn-primary')) !!}
            </div>
            {!! Form::close() !!}
        </div>


        <div class="col-md-4" style="border: 1px solid red">
            This area is reserved to live title search results
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Fotoğraf Yükle</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true)) !!}
                        <div class="control-group">
                            <div class="controls">
                                {!! Form::file('image') !!}
                                <p class="errors">{!!$errors->first('image')!!}</p>
                                @if(Session::has('error'))
                                    <p class="errors">{!! Session::get('error') !!}</p>
                                @endif
                            </div>
                        </div>
                        <div id="success"> </div>
                        {!! Form::submit('Yükle', array('class'=>'send-btn btn btn-primary')) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection