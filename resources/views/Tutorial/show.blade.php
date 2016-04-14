@extends('layouts.masterTutorialPage')
@extends('HeadFoot')
@section('content')
        <!-- blog-contents -->
<section class="col-md-11">

    <article class="single-blog-item">

        <p>{{$tutorial[0]->user->name}},{{$tutorial[0]->date}}</p>
        <a class="btn btn-large btn-success"
           href="/tutorial/subscribe/{{$tutorial[0]->user->id}}">{{$tutorial[0]->user->name}} Abone Ol</a>
        <div class="alert alert-info">
            <p>{{$tutorial[0]->tags}}</p>
            @if(Auth::user()->isAdmin() || Auth::user()->id == $tutorial[0]->user_id)
            <a href="{{ route('tutorial.edit', $tutorial[0]->id) }}">edit</a>

            {!! Form::open([ 'method' => 'DELETE','route' => ['tutorial.destroy', $tutorial[0]->id]]) !!}
            {!! Form::submit('Delete this task?', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            @endif
        </div>

        <h1>{{$tutorial[0]->title}}</h1>

        {!! $tutorial[0]->content !!}

    </article>

</section>
<!-- end of blog-contents -->


@endsection