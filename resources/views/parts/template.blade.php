<!DOCTYPE html>
<html>

<head>
    <base href="{{ URL::to('/') }}" />
    <title>No Border</title>
    <meta charset="utf-8" />
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="css/aos.css" rel="stylesheet" type="text/css" />
    <link href="css/fancybox.css" rel="stylesheet" type="text/css" />
    <link href="css/swiper.css" rel="stylesheet" type="text/css" />
    <link href="css/select2.min.css" rel="stylesheet" type="text/css" />
  <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="341c0207-8b1e-481a-b109-2a10a9905e5c" type="text/javascript"></script>
    @stack('styles')
</head>

<body>

    <div id="page">
        <div class = "sidenav">
            <div class = "sidenav-overlay">
                <div class = "sidenav-container">
                    <div class = "sidenav-top">
                        @if(App::isLocale('en'))
                        <div class = "sidenav-lang">
                            <div class = "sidenav-lang-image"><img class = "full-width" src = "images/engleza.png"></div>
                            <div class = "sidenav-lang-text">ENG</div>
                        </div>
                        <div class = "sidenav-change-language">
                            <a href = "locale/ro"><div class = "sidenav-language-change-element">RO</div></a>
                            <a href = "locale/en"><div class = "sidenav-language-change-element">ENG</div></a>
                        </div>
                        @else
                        <div class = "sidenav-lang">
                            <div class = "sidenav-lang-image"><img class = "full-width" src = "images/romania.png"></div>
                            <div class = "sidenav-lang-text">RO</div>
                        </div>
                        <div class = "sidenav-change-language">
                            <a href = "locale/ro"><div class = "sidenav-language-change-element">RO</div></a>
                            <a href = "locale/en"><div class = "sidenav-language-change-element">ENG</div></a>
                        </div>
                        @endif
                            <div class = "back-button">
                                <img src = "images/multiply.svg" class = "full-width">
                            </div>
                    </div>
                    <div class = "sidenav-continut">
                        <a style = "display:block;" href = ""><div class = "sidenav-logo"><img src = "images/logo.svg" class = "full-width"></div></a>
                        <div class = "sidenav-elemente-container">
                            <a href = "services" style = "display:block;"><div class = "sidenav-link-element">{{ __('site.servicii') }}@if(Request::path()=='services') <div class = "dunga-sidenav"></div>@endif</div></a>
                            <a href = "about" style = "display:block;"><div class = "sidenav-link-element">{{ __('site.despre') }}@if(Request::path()=='about') <div class = "dunga-sidenav"></div>@endif</div></a>
                            <a href = "jobs" style = "display:block;"><div class = "sidenav-link-element">{{ __('site.joburi') }} @if(Request::path()=='jobs') <div class = "dunga-sidenav"></div>@endif</div></a>
                            <a href = "partners" style = "display:block;"><div class = "sidenav-link-element">{{ __('site.parteneri') }} @if(Request::path()=='partners') <div class = "dunga-sidenav"></div>@endif</div></a>
                            <a href = "contact" style = "display:block;"><div class = "sidenav-link-element">contact @if(Request::path()=='contact') <div class = "dunga-sidenav"></div>@endif</div></a>
                        </div>
                    </div>
                    <div class = "sidenav-social">
                        <a href = "{{setting('site.facebook')}}" style = "display:block"><div class = "sidenav-social-item"><img src = "images/facebook-footer.svg" class = "full-width"></div></a>
                        <a href = "{{setting('site.youtube')}}" style = "display:block"><div class = "sidenav-social-item"><img src = "images/youtube-footer.svg" class = "full-width"></div></a>
                        <a href = "{{setting('site.linkedin')}}" style = "display:block"><div class = "sidenav-social-item"><img src = "images/linkedin-footer.svg" class = "full-width"></div></a>
                    </div>
                </div>
            </div>
        </div>
        @include('parts.header')
        <main id="content">
            <div class = "mobile-filter">
                <div class = "close-filter"><img class = "full-width" src = "images/multiply.svg"></div>
                {{-- <div class=  "mobile-filter-top">
                    
                </div> --}}
            </div>
            <div class=  "overlay-darker"></div>
            @yield('content')
        </main>
        @include('parts.footer')
    </div>
    <button class="scroll-up" style="display: block;"> <img src="images/sagetica.svg"> </button>

    <!--[if lt IE 9]> <script src="js/html5shiv.js"></script> <![endif]-->
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/aos.js" type="text/javascript"></script>
    <script src="js/fancybox.js" type="text/javascript"></script>
    <script src="js/swiper.js" type="text/javascript"></script>
    <script src="js/notify.js" type="text/javascript"></script>
    <script src="js/select2.min.js" type="text/javascript"></script>
    <script src="js/common.js" type="text/javascript"></script>


    @stack('scripts')
</body>

</html>