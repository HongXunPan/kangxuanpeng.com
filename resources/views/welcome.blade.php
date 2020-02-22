<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>康宣鹏 · HongXunPan · kangxuanpeng</title>

    <!-- Fonts -->
    {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}

    {{--icon--}}
    <link rel="icon" href="{{ asset("/icon/www.ico") }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset("/icon/www.ico") }}" type="image/x-icon"/>

    {{--css--}}
    <link rel="stylesheet" href="{{ asset("/css/base.css") }}" />
    <link rel="stylesheet" href="{{ asset("/css/index.css") }}" />
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124606004-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-124606004-2');
    </script>
</head>
<body>
<canvas width="3000" height="872"></canvas>
<div id="page" class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md"><a onclick="">HongXunPan</a></div>
        <div class="links">
            {{--<a href="#">xxx</a>--}}
            <a href="{{ route('blog.index') }}">Blog</a>
            <a href="//{{ config('domain.me') }}">About Me</a>
            <a href="#">Contact</a>
        </div>
    </div>
</div>
</body>

{{--js--}}
<script src="{{ asset('/js/index-canvas.js') }}" ></script>
</html>
