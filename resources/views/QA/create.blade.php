@extends('layouts.masterQACreate')
@extends('HeadFoot')
@section('content')

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script type="text/javascript">
        $(function () {
            $('#questionText').ckeditor();

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
                        minLength: 1,
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
            $('#myModal').hide();
            $("#myBtn").click(function () {
                var old_text = $('#questionText').val();
                var old_title = $('#title').val();
                var old_tags = $('#tags').val();
                if (old_text) {
                    $('#old_val_text').val(old_text);
                }
                if (old_title) {
                    $('#old_val_title').val(old_title);
                }
                if (old_tags) {
                    $('#old_val_tags').val(old_tags);
                }
                $('#myModal').show();
            });
        });

    </script>

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    <div class="fixed padding-20-v">
        <div class="row">
            <div class="col-12">
                <div class="margin-10-b">
                    <span class="dark x-large">Gönderen:</span> <span class="x-large link-default ease-link"><?php echo Auth::user()->name ?></span>
                </div>
                {!! Form::open(array('route' => 'QA.store', 'class' => 'form')) !!}
                <div class="form-group" , style="margin-top: 4%">
                    <div class="text margin-15-b rounded bordered light-bordered dual-bordered ease-form">
                        {{--<input type="text" placeholder="Başlık Yazınız *">--}}
                        @if(Session::has('old_val_title'))
                            {!! Form::text('title', Session::get('old_val_title'), array('id' => 'title', 'required', 'class'=>'form-control', 'placeholder'=>'Başlık')) !!}
                        @else
                            {!! Form::text('title', null, array('id' => 'title', 'required', 'class'=>'form-control', 'placeholder'=>'Başlık Yazınız *')) !!}
                        @endif
                        {{--                        {!! Form::text('title', null, array('required', 'class'=>'form-control', 'placeholder'=>'Başlık Yazınız *')) !!}--}}
                    </div>
                    <div class="x-large margin-15-b">Sorunuzu Yazın:</div>
                    <div class="textarea margin-15-b rounded bordered light-bordered dual-bordered ease-form">
                        {{--<textarea cols="30" rows="8"></textarea>--}}
                        @if(Session::has('old_val_text'))
                            {!! Form::textarea('question', Session::get('old_val_text'), array('id' => 'questionText', 'required',  'class'=>'form-control',  'placeholder'=>'Sorunuz')) !!}
                        @else
                            {!! Form::textarea('question', null, array('id' => 'questionText', 'required',  'class'=>'form-control',  'placeholder'=>'Sorunuz')) !!}
                        @endif
                        {{--                        {!! Form::textarea('content', null, array('id' => 'questionText', 'required',  'class'=>'form-control',  'placeholder'=>'Sorunuz')) !!}--}}
                    </div>
                    <div class="text margin-5-b rounded bordered light-bordered dual-bordered ease-form">
                        {{--<input type="text" placeholder="Etiketler (Zorunlu Değildir)">--}}
                        @if(Session::has('old_val_tags'))
                            {!! Form::text('tags', Session::get('old_val_tags'), array('id'=>'tags', 'required', 'class'=>'form-control', 'placeholder'=>'Etiket')) !!}
                        @else
                            {!! Form::text('tags', null, array('id'=>'tags', 'required', 'class'=>'form-control', 'placeholder'=>'Etiket')) !!}
                        @endif
                        {{--                        {!! Form::text('tags', null, array('id'=>'tags', 'required', 'class'=>'form-control', 'placeholder'=>'Etiket')) !!}--}}
                    </div>
                    <p class="hint dark margin-15-b">Aralarına virgül koyarak ilgili etiketleri yazınız.</p>

                    <div class="md-align-center">
                        {!! Form::submit('SORU GÖNDER',  array('class'=>'btn btn-responsive rounded theme-youtestify ui-dark ease-bg')) !!}
                    </div>
                    {!! Form::close() !!}

                    <div class="md-align-center">
                        <div class="x-large margin-15-b">Fotoğraf Yükle:
                            <button class="btn btn-sm circle ease-bg" id="myBtn" type="button" data-toggle="modal"
                                    data-target="#myModal">Fotoğraf Yükle
                            </button>
                            <!-- Modal -->
                            <div id="myModal" title="Fotoğraf Yükle">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        {{--<div class="modal-header">--}}
                                        {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                                        {{--<h4 class="modal-title" id="myModalLabel">Fotoğraf Yükle</h4>--}}
                                        {{--</div>--}}
                                        <div class="modal-body">
                                            {!! Form::open(array('url' => 'apply/upload', 'id'=>'fotoYukleForm', 'method' => 'POST', 'files' => true)) !!}
                                            {!! csrf_field() !!}
                                            <div class="control-group">
                                                <div class="controls">
                                                    <input id="myImage" type="file" name="image">
                                                    <p class="errors">{!!$errors->first('image')!!}</p>
                                                    @if(Session::has('error'))
                                                        <p class="errors">{!! Session::get('error') !!}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div id="success"></div>
                                            <input type="hidden" id="old_val_text" name="old_val_text" value=""/>
                                            <input type="hidden" id="old_val_tags" name="old_val_tags" value=""/>
                                            <input type="hidden" id="old_val_title" name="old_val_title" value=""/>
                                            {!! Form::submit('Yükle', array('id' => 'fotoYukle', 'class'=>'send-btn btn btn-primary')) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(Session::has('success'))
                            <div class="alert-box success">
                                <h5>{!! Session::get('success') !!}</h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection