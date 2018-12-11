<!doctype html>
<html>
<head>
    @include('blog::common.head')
    @section('htmlHead')
        {{--default title--}}
        <title>Blog - HongXunPan</title>
        <meta name="keywords" content="康宣鹏,HongXunPan,kangxuanpeng,Blog,website">
        <meta name="description" content="Index">
        <link href="{{ asset('/css/blog/post/style.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/blog/post/comment.min.css') }}" rel="stylesheet">
    @show

    @include('blog::common.ga-config')
</head>
@section('body')
        <body class="bg-grey" gtools_scp_screen_capture_injected="true">
@show

@include('blog::common.ie8')

@section('nav')
    @include('blog::common.header')
@show

@yield('mainBody')
@include('blog::common.footer')

@section('script')
    @include('blog::common.script')
@show
</body>
</html>