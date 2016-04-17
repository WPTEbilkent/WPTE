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
    @endforeach


@endsection