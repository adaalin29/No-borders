<!DOCTYPE html>
<html>

<head>
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
        @stack('styles')
    </head>
</head>

<body>
    <div class = "container">
        <div class = "error-image">
            <img src = "images/eroare.png" class = "full-width">
        </div>
        <div class = "error-text-container">
            <div class = "error-title">{{ __('site.error-title') }}</div>
            <div class = "error-text">{{ __('site.error-text') }}</div>
            <a href="" class="eroare-a-link">
                <div class="error-link">{{ __('site.error-button') }}</div>
            </a>
        </div>
    </div>

    <!--[if lt IE 9]> <script src="js/html5shiv.js"></script> <![endif]-->
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/common.js" type="text/javascript"></script>
</body>


@stack('scripts')


</html>