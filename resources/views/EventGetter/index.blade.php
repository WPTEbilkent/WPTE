@extends('layouts.masterEvent')
@extends('HeadFoot')
@section('content')
    <div id="EventContent">
        <div class="col-8">
            @foreach($events as $item)
                <?php
                $status = $item->status;
                    //For Admin Check
                ?>
                @if(1)
                    <div class="portlet rounded bordered light-bordered">
                        <div class="content-side padding-15">
                            <span class="dark x-large">Tür: </span> <a
                                    class="x-large link-default ease-link">{{$item->type}}</a>
                            <span class="dark x-large">Yer: </span> <a
                                    class="x-large link-default ease-link">{{$item->location}}</a>
                            <div class="sp10"></div>
                            <a class="question-link ease-color" href="{{$item->url}}">{{$item->header}}</a>
                        </div>
                        <div class="content-side padding-15 theme-gray ui-x-light">
                            <div class="row row-no-padding">
                                <div class="col-6 xs-align-center xs-responsive">
                                    <a class="btn btn-xs padding-10-h circle ease-bg searchTag">{{$item->source}}</a>
                                </div>
                                <div class="col-6 align-right xs-align-center dark small padding-5-v xs-responsive">
                                    <i class="fa fa-calendar-o margin-5-r"></i> @if($item->date){{$item->date}}@else Not
                                    Known @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <?php if (isset($header)) { ?>
            @foreach($header as $item)
                <?php
                $status = $item->status;
                ?>
                @if($status == 0)
                    <div class="portlet rounded bordered light-bordered">
                        <div class="content-side padding-15">
                            <span class="dark x-large">Type: </span> <a
                                    class="x-large link-default ease-link">{{$item->type}}</a>
                            <div class="sp10"></div>
                            <a class="question-link ease-color" href="{{$item->url}}">{{$item->header}}</a>
                        </div>
                        <div class="content-side padding-15 theme-gray ui-x-light">
                            <div class="row row-no-padding">
                                <div class="col-6 xs-align-center xs-responsive">
                                    <a class="btn btn-xs padding-10-h circle ease-bg searchTag">{{$item->source}}</a>
                                </div>
                                <div class="col-6 align-right xs-align-center dark small padding-5-v xs-responsive">
                                    <i class="fa fa-calendar-o margin-5-r"></i> @if($item->date){{$item->date}}@else Not
                                    Known @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <?php }?>
            <?php if (isset($source)) { ?>
            @foreach($source as $item)
                <?php
                $status = $item->status;
                ?>
                @if($status == 0)
                    <div class="portlet rounded bordered light-bordered">
                        <div class="content-side padding-15">
                            <span class="dark x-large">Type: </span> <a
                                    class="x-large link-default ease-link">{{$item->type}}</a>
                            <div class="sp10"></div>
                            <a class="question-link ease-color" href="{{$item->url}}">{{$item->header}}</a>
                        </div>
                        <div class="content-side padding-15 theme-gray ui-x-light">
                            <div class="row row-no-padding">
                                <div class="col-6 xs-align-center xs-responsive">
                                    <a class="btn btn-xs padding-10-h circle ease-bg searchTag">{{$item->source}}</a>
                                </div>
                                <div class="col-6 align-right xs-align-center dark small padding-5-v xs-responsive">
                                    <i class="fa fa-calendar-o margin-5-r"></i> @if($item->date){{$item->date}}@else Not
                                    Known @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <?php }?>
                            <!-- pagination -->
                    <div class="pagination align-center">
                        <?php
                        $rend = $events->render();
                        if (isset($header)) {
                            echo $header->render();
                        }
                        if (isset($source)) {
                            echo $source->render();
                        }
                        $rend = str_replace("<a", '<a class="btn circle ease-bg"', $rend);
                        $rend = str_replace('<li class="disabled"><span', '<li class="disabled"><span class="btn large prev circle ease-bg"', $rend);
                        $rend = str_replace('<li class="active"><span', '<li class="active"><span class="btn btn-active circle ease-bg theme-youtestify ui-dark"', $rend);
                        $rend = str_replace('<li class="disabled">', ' ', $rend);
                        $rend = str_replace('<li class="active">', ' ', $rend);
                        $rend = str_replace('<li>', ' ', $rend);
                        $rend = str_replace("</li>", ' ', $rend);
                        echo $rend;
                        ?>
                    </div>
        </div>
    </div>
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@stop