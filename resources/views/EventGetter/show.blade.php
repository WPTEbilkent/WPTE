@extends('layouts.masterQA')
@extends('HeadFoot')
@section('content')

    <div id="QAContent">
        <div class="col-8">
            @foreach($newEvents as $item)
                <div class="content-side padding-15 theme-gray ui-x-light">
                    <div class="row row-no-padding">
                        <div class="col-6 xs-align-center xs-responsive">
                            <span>{{$item->header}}</span>
                            {{--<a class="x-large link-default ease-link"--}}
                               {{--href="{{url('/profile')}}/{{$item->user->id}}">{{$item->user->name}}</a>--}}
                        </div>
                        <div class="col-6 align-right xs-align-center dark small padding-5-v xs-responsive">
                            <a class="x-large link-default ease-link" href="/events/edit/{{$item->id}}">DUZENLE</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection