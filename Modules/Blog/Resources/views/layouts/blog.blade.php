<!doctype html>
<html>
<head>
    @include('blog::common.head')
    @section('htmlHead')
        {{--default title--}}
        <title>Blog - HongXunPan</title>
        <meta name="keywords" content="HongXunPan Blog">
        <meta name="description" content="">
    @show
</head>
<body class="bg-grey" gtools_scp_screen_capture_injected="true">
@include('blog::common.ie8')

@section('nav')
    @include('blog::common.header')
@show

@yield('mainBody')
@include('blog::common.footer')
@include('blog::common.script')
</body>
</html>