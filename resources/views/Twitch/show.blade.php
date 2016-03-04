@extends('layouts.masterTwitch')
@extends('HeadFoot')
@section('content')



        <!-- blog-contents -->
<section class="col-md-11">

    <article class="single-blog-item">
        <iframe
                src="http://player.twitch.tv/?channel={{$twitch_id}}"
                height="720"
                width="1280"
                frameborder="0"
                scrolling="no"
                allowfullscreen="true">
        </iframe>



    </article>

</section>
<!-- end of blog-contents -->




@endsection