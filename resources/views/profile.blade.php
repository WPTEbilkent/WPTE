@extends('layouts.masterProfile')
@extends('HeadFoot')
@section('content')


    <div class="row row-no-padding-hor theme-gray ui-light">
        <div class="col-12">
            <div class="fixed">
                <div class="row row-no-padding-ver">
                    <div class="col-12 xs-responsive">
                        <h4 class="align-left xs-align-center theme-night ui-text margin-5-v">{{$user->name}} - Profil
                            Sayfası</h4>
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
                                İsim-Soyisim: {{$user->name}}
                                <br>
                                E-mail: {{$user->email}}
                                <br>
                                @if($user->phone)
                                    Adres:{{$user->phone}}
                                    <br>
                                @endif
                                @if($user->address)
                                    Telefon:{{$user->address}}
                                    <br>
                                @endif
                                <div class="portlet padding-10 margin-15-t rounded theme-gray ui-x-light">
                                    <div class="content-side padding-10-b">
                                        <div class="row row-no-padding">
                                            <div class="col-6 padding-5-v md-align-center">
                                                <strong>Abonelikler ve Makaleleri</strong>
                                                @foreach($subs as $sub)
                                                    <br>
                                                    {{ \App\User::findorfail($sub->subscribed_id)->name }}
                                                    <hr>
                                                    <?php
                                                    $tutorials = \App\Tutorial::where('user_id', $sub->subscribed_id)->get();
                                                    ?>
                                                    @foreach($tutorials as $tutorial)
                                                        <div>
                                                            <a class="dark link-default ease-link"
                                                               href="{{url('/tutorial')}}/{{$tutorial->id}}">{{$tutorial->title}}</a>
                                                            <br>
                                                            <cite title="Source Title">{{$tutorial->date}}</cite>
                                                        </div>
                                                    @endforeach

                                                    <br>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($newEventsCount > 0)
                                    <h3>Yeni Etkinlik Düzenleme</h3>
                                    <a class="btn btn-responsive rounded theme-youtestify ui-dark ease-bg"
                                       href="{{url('/events/show')}}">{{$newEventsCount}} Yeni Etkinlik</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection



