@extends('blog::layouts.blog')

@section('htmlHead')
    <title> {{ $tagName }} - HongXunPan</title>
    <meta name="description" content="{{ $tagName }}">
    <meta name="keywords" content="{{ $tagName }}">
    <meta name="description" content="👇 The following tabs can help you!">
@endsection

@section('nav')
    @parent
@endsection

@section('mainBody')
    <div class="main-content common-page clearfix">
        <div class="common-item">
            <div class="common-title">
                Tag : {{ $tagName }}
            </div>
            <div class="post-lists">
                <div class="post-lists-body">
                    <!--foreach-->
                    @if(!count($postList))
                        <div class="post-list-item">
                            Nothing to show, see other
                        </div>
                    @endif
                    @foreach($postList as $post)
                        <div class="post-list-item">
                            <div class="post-list-item-container ">
                                <div class="item-label ">
                                    <div class="item-title">
                                        <a href="{{ url('post') }}/{{ $post->post_id }}/{{ $post->slug }}">{{ $post->post_name }}</a>
                                    </div>
                                    <!--post type icon-->
                                    <div class="item-meta clearfix">
                                        {{--<div class="item-meta-ico bg-ico-web"--}}
                                        {{--style="background: url(images/bg-ico.png) no-repeat;background-size: 40px auto;"></div>--}}
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
        </div>
        {!! preg_replace("~(/\d+)?\?page=~", '/', $postList->render()) !!}
        {{--        {{ $postList->render() }}--}}
    </div>
@endsection