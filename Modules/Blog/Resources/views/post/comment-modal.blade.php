<div id="respond-post-1" class="comment-container">
    <div id="comments" class="clearfix">
        <span class="response">Responses
            <a id="cancel-comment-reply-link"
               href="https://www.linpx.com/p/the-move-to-change-the-domain-name-to-start-blog-revision.html#respond-post-1"
               rel="nofollow" style="display:none" onclick="return TypechoComment.cancelReply();"> / Cancel Reply</a>
        </span>
        {{--input comment--}}
        <form method="post"
              action="https://www.linpx.com/p/the-move-to-change-the-domain-name-to-start-blog-revision.html/comment?_=2b9a1bab8a31620d8848c64be0b51f16"
              id="comment-form" class="comment-form" role="form"
              onsubmit="getElementById('misubmit').disabled=true;return true;">
            <input type="text" name="author"
                   maxlength="12" id="author"
                   class="form-control input-control clearfix"
                   placeholder="Name (*)" value=""
                   required="">
            <input type="email"
                   name="mail"
                   id="mail"
                   class="form-control input-control clearfix"
                   placeholder="Email (*)"
                   value=""
                   required="">
            <input type="url" name="url" id="url" class="form-control input-control clearfix"
                   placeholder="Site (http://)" value="">
            <textarea name="text" id="textarea" class="form-control"
                      placeholder="Your comment here. Be cool. "
                      required=""></textarea>
            <button type="submit" class="submit" id="misubmit">SUBMIT</button>
            <input type="hidden" name="_" value="ed13e5d6f94bbf2c2a16e32dcf761b27"></form>
        @include('blog::post.comment-list')
        {!! preg_replace("~(\b/commentPage-\d+)?\?commentPage=~", '/commentPage-', $commentList->render()) !!}
        
    </div>
</div>