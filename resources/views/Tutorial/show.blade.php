@extends('layouts.masterTutorialPage')
@extends('HeadFoot')
@section('content')


    <div class="row row-no-padding-hor theme-gray ui-light">
        <div class="col-12">
            <div class="fixed">
                <div class="row row-no-padding-ver">
                    <div class="col-12 xs-responsive">
                        <h4 class="align-left xs-align-center theme-night ui-text margin-5-v">{{$tutorial[0]->title}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed padding-20-v">
        <div class="row">
            <div class="col-12">
                <div class="portlet rounded bordered light-bordered">
                    <div class="col-static no-responsive ">
                        <div class="row">
                            <div class="col-12 padding-15">
                                <span class="dark x-large">Yazar:</span> <a class="x-large link-default ease-link" href="#">{{$tutorial[0]->user->name}}</a>
                                @if(Auth::guest())
                                @else
                                    @if((\App\Subscription::where("subscriber_id", Auth::user()->id)->where("subscribed_id", $tutorial[0]->user->id)->get()->isEmpty()))
                                        <a class="btn btn-sm btn-responsive rounded theme-night ui-dark ease-bg"
                                           href="/tutorial/subscribe/{{$tutorial[0]->user->id}}">Abone Ol</a>
                                    @elseif($tutorial[0]->user->id == Auth::user()->id)
                                    @else
                                        <a class="btn btn-sm btn-responsive rounded theme-night ui-dark ease-bg"
                                           href="/tutorial/unsubscribe/{{$tutorial[0]->user->id}}">Abone Olmaktan Çık</a>
                                    @endif
                                @endif
                                <div class="sp10"></div>
                                {!! $tutorial[0]->content !!}

                                <div class="row row-no-padding-ver">
                                    <div class="col-6 xs-align-center xs-responsive">
                                        <?php
                                        $tags = explode(',', $tutorial[0]->tags);
                                        ?>
                                        @foreach($tags as $tag)
                                                @if($tag)
                                                    <spam class="btn btn-xs padding-10-h margin-5-b circle ease-bg">{{$tag}}</spam>
                                                @endif
                                        @endforeach

                                    </div>
                                    <div class="col-6 align-right xs-align-center dark small padding-5-v xs-responsive">
                                        <i class="fa fa-calendar-o margin-5-r"></i> {{$tutorial[0]->date}}
                                    </div>
                                </div>
                            </div>
                            @if(!Auth::guest())
                                @if(Auth::user()->isAdmin() || Auth::user()->id == $tutorial[0]->user_id)
                                    <a href="{{ route('tutorial.edit', $tutorial[0]->id) }}">edit</a>
                                    {!! Form::open([ 'method' => 'DELETE','route' => ['tutorial.destroy', $tutorial[0]->id]]) !!}
                                    {!! Form::submit('Delete this task?', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection