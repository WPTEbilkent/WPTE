<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html dir="ltr" lang="tr">

<head>
    <title>YouTestify - A unique web platform for test engineers</title>
    <!--  Necessary scripts  -->
    @yield('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var input = "";
            var url = "";
            $('#searchButton').click(function () {
                input = "";
                url = "";
                input = $('#searchText').val();
                if (!input.length > 0) {
                    input = "null";
                }
                url = "{!! url('/tutorial/search') !!}" + "/" + input;
                ajax(url);
            });
            $('.searchTag').click(function () {
                input = "";
                url = "";
                input = $(this).html();
                url = "{!! url('/tutorial/search') !!}" + "/" + input;
                ajax(url);
            });
        });
        $(document).keypress(function(e) {
            if(e.which == 13) {
                $("#searchButton").click();
            }
        });x""
        function ajax(url) {
            $.get(url, function (question) {
                $("#QAContent").html(question);
            });
        }
    </script>
</head>
<body>
@yield('header')
<main role="main" class="container">
    <div class="row row-no-padding-hor theme-gray ui-light">
        <div class="col-12">
            <div class="fixed">
                <div class="row row-no-padding-ver">
                    <div class="col-8 xs-responsive">
                        <h4 class="align-left xs-align-center theme-night ui-text margin-5-v">Eğitim</h4>
                    </div>
                    <div class="col-4 xs-responsive align-right">
                        <a class="btn btn-responsive rounded theme-youtestify ui-dark ease-bg"
                           href="{{ URL::to('/tutorial/create') }}">Yeni Bir Yazı Yazın</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed padding-20-v">
        <div class="row">
            <div id="QAContent">
                @yield('content')
            </div>
            {{--@yield('sidebar')--}}
        </div>
    </div>

</main>

<footer>
    @yield('footer')
</footer>


</body>
</html>
