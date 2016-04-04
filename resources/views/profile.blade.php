@extends('layouts.masterProfile')
@extends('HeadFoot')
@section('content')


                <?php $user=App\user::find($id); echo print_r($user)?>

                {{$user->name}}
    {{$user->id}}


@endsection