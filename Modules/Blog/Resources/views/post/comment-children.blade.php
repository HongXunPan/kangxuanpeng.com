<div class="comment-children">
    <ol class="comment-list">
        @foreach($comment->children as $comment)
            <li id="li-comment-2611" class="comment-body comment-child">
                @include('blog::post.comment-content')
            </li>
        @endforeach
    </ol>
</div>
