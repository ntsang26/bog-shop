<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOG - Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="{{asset("plugin/frontend/css/reset.css")}}">
    <link rel="stylesheet" href="{{asset("plugin/frontend/css/style.css")}}">
    <link rel="shortcut icon" href="{{asset("plugin/frontend/img/logo.png")}}" type="image/x-icon">
    <script src="{{asset("plugin/frontend/js/script.js")}}"></script>
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=775500863196309&autoLogAppEvents=1"
        nonce="uyKH4ROY"></script>

    <div class="wrapper">
        @yield('main-header')
        @yield('main-content')
        @yield('main-footer')
        <span class="to-top">
            <i class="fas fa-long-arrow-alt-left"></i>
            Về đầu trang
        </span>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                if($(window).scrollTop() > 300) {
                    $('.to-top').css({
                        "opacity": "1",
                        "pointer-events": "auto"
                    });                   
                } else {
                    $('.to-top').css({
                        "opacity": "0",
                        "pointer-events": "none"
                    });  
                }
            });
            $('.to-top').click(function() {
                $('html').animate({scrollTop: 0}, 800);
            });
        });
    </script>
    @yield('main-script')
</body>

</html>