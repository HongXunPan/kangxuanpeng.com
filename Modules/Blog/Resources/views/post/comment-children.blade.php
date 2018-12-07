<div class="comment-children">
    <ol class="comment-list">
        @foreach($comment->children as $comment)
            <li id="li-comment-{{ $comment->comment_id }}" class="comment-body comment-child">
                @include('blog::post.comment-content')
            </li>
        @endforeach
    </ol>
</div>
