@extends('layouts.masterProfile')
@extends('HeadFoot')
@section('content')


                <?php $user=App\user::find($id);?>

                {{$user->name}}


@endsection