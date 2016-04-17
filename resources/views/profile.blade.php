@extends('layouts.masterProfile')
@extends('HeadFoot')
@section('content')


              {{$user->name}}</br>
              {{$user->email}}</br>

                @foreach($subscribers as $subscriber)
                    {{$subscriber->name}}</br>
                    -------------</br>


                @endforeach


@endsection