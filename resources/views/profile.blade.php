@extends('layouts.masterProfile')
@extends('HeadFoot')
@section('content')

    {{$user->name}}
    <br>
    @foreach($subs as $sub)
        {{ \App\User::findorfail($sub->subscribed_id)->name }}<br>
        -----------------<br>
        <?php
            $tutorials = \App\Tutorial::where('user_id',$sub->subscribed_id)->get();
        ?>
        @foreach($tutorials as $tutorial)
            {{$tutorial->title}}<br>
        @endforeach

        <br>
        <?php
            if($newEventsCount > 0){
                echo'<a class="btn btn-responsive rounded theme-youtestify ui-dark ease-bg" href="http://localhost:8000/events/show">'.$newEventsCount.'Yeni Etkinlik</a>';
            }
        ?>

    @endforeach


@endsection