@extends('blog::layouts.blog')

@section('htmlHead')
    <title>Blog-HongXunPan-康宣鹏-kangxuanpeng</title>
    <meta name="description" content="康宣鹏,HongXunPan,kangxuanpeng,Blog,博客,website,Index">
    <meta name="keyword" content="康宣鹏,HongXunPan,kangxuanpeng,Blog,博客,website,Index">
@endsection

{{--@section('nav')--}}
    {{--@include('blog::common.header')--}}
{{--@endsection--}}

@section('mainBody')
    <div class="main-content archive-page clearfix">
        <!--post list-->
        <div class="categorys-item">
            <!--foreach-->
            @if(!count($postList))
                <div class="categorys-title">
                    Blog of HongXunPan
                </div>
                <div class="post-lists">
                    <div class="post-lists-body">
                        <div class="post-list-item">
                            Nothing to show, coming soon
                        </div>
                    </div>
                </div>
            @endif
            @foreach($postList as $month => $posts)
            <!--title-->
                <div class="categorys-title">
                    {{ $month }}
                </div>
                <div class="post-lists">
                    <div class="post-lists-body">
                    @foreach($posts as $post)
                        <!--post-->
                            <div class="post-list-item">
                                <div class="post-list-item-container">
                                    <div class="item-label">
                                        <div class="item-title">
                                            <a href="{{ url('post/') }}/{{ $post->slug }}">
                                                {{ $post->post_name }}
                                            </a>
                                        </div>
                                        <div class="item-meta clearfix">
                                            <div class="item-meta-date">
                                                {{ $post->created_at->format('M j, Y H:i') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection