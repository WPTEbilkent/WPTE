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
            {{--<a href="">{{$item->tag}}</a>,--}}
            {{--<a href="#">css3</a>,--}}
            {{--<a href="#">jquery</a>,--}}
            {{--<a href="#">tutorials</a>--}}
            {{--updated--}}
            {{--<time>july 30,2015</time>--}}

        </div>

        <h1>{{$tutorial[0]->title}}</h1>

        {!! $tutorial[0]->content !!}

    </article>

</section>
<!-- end of blog-contents -->


@endsection