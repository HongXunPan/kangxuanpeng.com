@extends('blog::layouts.blog')

@section('htmlHead')
    <title>Search Page - HongXunPan</title>
    <meta name="keywords" content="">
    <meta name="description" content="👇 The following tabs can help you!">
@endsection

@section('mainBody')
    <div class="main-content page-page">
        <div class="search-page">
            <!--search form-->
            {{--<form id="search" class="search-form" method="post" action="/" role="search">--}}
            {{--<span class="search-box clearfix"> <input type="text" id="input" class="input" name="s" required="true"--}}
            {{--placeholder="Search..." maxlength="30" autocomplete="off"> <button--}}
            {{--type="submit" class="spsubmit"><i class="icon-search"></i></button> </span>--}}
            {{--</form>--}}
            <div class="search-tags">
                @if(count($tagList))
                    <p>👇 The following tabs can help you!</p>
                    <!--foreach tags-->
                    <!--https://www.linpx.com/tag/JavaScript/-->
                    @foreach($tagList as $tag)
                        <a href="{{ url('tag/') }}/{{ $tag->tag_name }}" class=" bg-white"># {{ $tag->tag_name }}
                            ({{ $tag->postNum }})</a>
                    @endforeach
                    {{--<a href="#" class=" bg-white"># TAG aaa NAME(NUM)</a>--}}
                    {{--<a href="#" class=" bg-white"># TAG NAME(NUM)</a>--}}
                    {{--<a href="#" class=" bg-white"># TAG NAME(NUM)</a>--}}
                    {{--<a href="#" class=" bg-white"># TAG NAME(NUM)</a>--}}
                    {{--<a href="#" class=" bg-white"># TAG NAME(NUM)</a>--}}
                    {{--<a href="#" class=" bg-white"># TAG a NAME(NUM)</a>--}}
                    {{--<a href="#" class=" bg-white"># TAG NAME(NUM)</a>--}}
                    {{--<a href="#" class=" bg-white"># TAG aaNAME(NUM)</a>--}}
                    {{--<a href="#" class=" bg-white"># TAG aaa NAME(NUM)</a>--}}
                    {{--<a href="#" class=" bg-white"># TAG NAME(NUM)</a>--}}
                    {{--<a href="#" class=" bg-white"># TAG a NAME(NUM)</a>--}}
                    {{--<a href="#" class=" bg-white"># TAG NAME(NUM)</a>--}}
                    {{--<a href="#" class=" bg-white"># TAG NAME(NUM)</a>--}}
                    {{--<a href="#" class=" bg-white"># TAGa NAME(NUM)</a>--}}
                    {{--<a href="#" class=" bg-white"># TAG NAME(NUM)</a>--}}
                    {{--<a href="#" class=" bg-white"># TAG NAME(NUM)</a>--}}
                    {{--<a href="#" class=" bg-white"># TAG NAME(NUM)</a>--}}
                @else
                    <a onclick="disabled" class=" bg-white">EMPTY TAG</a>
                @endif
                    <div class="search-tags-hr bg-deepgrey"></div>
            </div>

        </div>
    </div>
@endsection