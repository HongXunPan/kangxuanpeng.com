<ol class="comment-list">
    @foreach($commentList as $comment)
        <li id="li-comment-{{ $comment->comment_id }}" class="comment-body comment-parent">
            @include('blog::post.comment-content')
        </li>
    @endforeach
</ol>