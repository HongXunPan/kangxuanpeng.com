@extends('blog::layouts.blog')

@section('htmlHead')
    <title>Search Page - HongXunPan</title>
    <meta name="description" content="Search,康宣鹏,HongXunPan,kangxuanpeng,">
    <meta name="keywords" content="Search,康宣鹏,HongXunPan,kangxuanpeng,">
    <meta name="description" content="👇 The following tabs can help you!">
@endsection

@section('mainBody')
    <div class="main-content page-page">
        <div class="search-page">
            <!--search form-->
            <form id="search" class="search-form" method="post" action="{{ url('search') }}" role="search" onsubmit="return submitSearch()">
            {{ csrf_field() }}
            <span class="search-box clearfix"> <input type="text" id="input" class="input" required="true"
            placeholder="Search..." maxlength="30" autocomplete="off"> <button
            type="submit" class="spsubmit"><i class="icon-search"></i></button> </span>
            </form>
            <div class="search-tags">
                @if(count($tagList))
                    <p>👇 The following tabs can help you!</p>
                    <!--foreach tags-->
                    <!--https://www.linpx.com/tag/JavaScript/-->
                    @foreach($tagList as $tag)
                        <a href="{{ url('tag/') }}/{{ $tag->tag_name }}" class=" bg-white"># {{ $tag->tag_name }}
                            ({{ $tag->postNum }})</a>
                    @endforeach
                @else
                    <a onclick="disabled" class=" bg-white">EMPTY TAG</a>
                @endif
                    <div class="search-tags-hr bg-deepgrey"></div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    @parent
    @include('blog::search.script')
@endsection