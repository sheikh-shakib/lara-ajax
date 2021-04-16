<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>infinite scroll pagination</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <!-- Scripts -->
     <script src="{{ asset('js/jquery.min.js') }}"></script>
     <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Infinite Scroll Pagination</h2>
            </div>
            <div class="col-md-12" id="post-data">
                @include('data')
            </div>
        </div>
    </div>
    <div class="ajax-load text-center" style="">
        <p><img src="{{asset('images/giphy.gif')}}" alt="">Loading more data</p>
    </div>
    <script>
        function loadmoreData(page) {
            $.ajax({
                type: "get",
                url: "?page"+page,
                brforeSend: function () {
                    $('.ajax-load').show();
                }
                })
                .done(function (data) {
                    if (data.html == " ") {
                            $('.ajax-load').html("No more records found");
                            return;
                        }
                        $('#post-data').append(data.html);
                })
                .fail(function (jqXHR,ajaxOptions,thrownError) {
                    alert('server not responding......')
                });
        }
        var page =1;
        $(window).scroll(function () {
            if ($(window).scrollTop()+ $(window).height() >= $(document).height()) {
                page++;
                loadmoreData(page);
            }
        });
    </script>
</body>
</html>
