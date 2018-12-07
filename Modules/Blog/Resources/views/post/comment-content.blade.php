{{--div#comment-id--}}
<div id="comment-{{ $comment->comment_id }}">
    <div class="comment-view" onclick="">
        <div class="comment-header">
            {{--img--}}
            {{--<img class="avatar" src="" width="80" height="80">--}}
            <span class="comment-author">
                @if($comment->site)
                    <a href="{{ $comment->site }}" target="_blank" rel="external nofollow">{{ $comment->nick_name }}</a>
                @else
                    {{ $comment->nick_name }}
                @endif
            </span>
        </div>
        <div class="comment-content">
            {{--reply for--}}
            @if($comment->parent)
                <span class="comment-author-at"><a href="#comment-{{ $comment->parent->comment_id }}">@<color>{{ $comment->parent->nick_name }}</color></a></span>
            @endif
            {{--comment-content--}}
            <p>{{ $comment->content }}</p>
        </div>
        <div class="comment-meta">
            {{--comment-time--}}
            <time class="comment-time">{{ $comment->created_at->format('M j, Y H:i:s') }}</time>
            {{--reply-btn--}}
            <span class="comment-reply">
                <a href="{{ url()->current() }}?replyTo={{ $comment->comment_id }}#respond-post-{{ $post->post_id }}" rel="nofollow"
                >Reply</a>
            </span>
        </div>
    </div>
</div>
@if($comment->children)
    @include('blog::post.comment-children')
@endif