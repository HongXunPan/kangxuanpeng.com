@extends('blog::layouts.blog')

@section('htmlHead')
    <title> {{ $post->post_name }} - LiNPX</title>
    <meta name="keywords" content="博客,日志">
    <meta name="description" content="MAIN CONTENT balalalala ...">
@endsection

@section('nav')
    @parent
@endsection

@section('mainBody')
    <article class="main-content page-page" itemscope itemtype="http://schema.org/Article">
        <div class="post-header">
            <h1 class="post-title" itemprop="name headline">{{ $post->post_name }}</h1>
            <div class="post-data">
                <!--js time - - day month-->
                <time datetime="{{ $post->created_at->toIso8601String() }}" itemprop="datePublished">Published on {{ $post->created_at->format('M j, Y H:i:s') }}</time>
                {{--with--}}
                <!--comment's num-->
                {{--<a href="#comments"> 33 comments</a>--}}
            </div>
        </div>
        <div id="post-content" class="post-content" itemprop="articleBody">
            <!--tag list foreach-->
            <p class="post-tags">
                @foreach($post->tags as $tag)
                    <a href="{{url('tag/')}}/{{ $tag->tag_name }}">{{ $tag->tag_name }}</a>
                @endforeach
            </p>
            {{--post content--}}
            {{ $post->content }}
            <!--personal sign-->
            <p class="post-info"> 本文由 <a href="#">Chakhsu Lau</a> 创作，采用 <a
                        href="https://creativecommons.org/licenses/by/4.0/" target="_blank"
                        rel="external nofollow">知识共享署名4.0</a> 国际许可协议进行许可<br>本站文章除注明转载/出处外，均为本站原创或翻译，转载前请务必署名<br>最后编辑时间为:
                Apr 13,
                2017 at 09:23 pm </p>
        </div>
    </article>

    {{--bottom Bar--}}
    @include('blog::post.bottomBar')
    {{--comment List--}}

    <div id="directory-content" class="directory-content">
        <div id="directory"></div>
    </div>
@endsection

@section('script')
    @parent
    @include('blog::post.script')
@endsection