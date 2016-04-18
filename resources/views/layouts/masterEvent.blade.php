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
                url = "{!! url('/events/search') !!}" + "/" + input;
                ajax(url);
            });
            $('.searchTag').click(function () {
                input = "";
                url = "";
                input = $(this).html();
                url = "{!! url('/events/search') !!}" + "/" + input;
                ajax(url);
            });
        });
        function ajax(url) {
            $.get(url, function (events) {
                $("#EventContent").html(events);
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
                        <h4 class="align-left xs-align-center theme-night ui-text margin-5-v">Etkinlikler</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed padding-20-v">
        <div class="row">
            <div id="EventContent">
                @yield('content')
            </div>
            @yield('sidebar')
        </div>
    </div>

</main>

<footer>
    @yield('footer')
</footer>


</body>
</html>
