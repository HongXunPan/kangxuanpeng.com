<div id="respond-post-{{ $post->post_id }}" class="comment-container">
    <div id="comments" class="clearfix">
        <span class="response">Responses
            <a id="cancel-comment-reply-link"
               href="{{  URL::current() }}#respond-post-1"
               rel="nofollow" @if(!Request()->replyTo)style="display:none"@endif> / Cancel Reply</a>
        </span>
        {{--input comment--}}
        <form method="post"
              action="{{ url('post/comment/'.$post->post_id) }}"
              id="comment-form" class="comment-form" role="form"
              onsubmit="confirmForm()">
            <input type="text" name="nick_name"
                   maxlength="12" id="author"
                   class="form-control input-control clearfix"
                   placeholder="Name (*)" value=""
                   required="">
            <input type="email"
                   name="email"
                   id="mail"
                   class="form-control input-control clearfix"
                   placeholder="Email (*)"
                   value=""
                   required="">
            <input type="url" name="site" id="url" class="form-control input-control clearfix"
                   placeholder="Site (http://)" value="">
            <textarea name="content" id="textarea" class="form-control"
                      placeholder="Type your comment here. Be cool. "
                      required=""></textarea>
            @if(!$isDisableComment){{ csrf_field() }} @endif
            <button type="submit" class="submit" @if($isDisableComment) disabled @endif id="misubmit">SUBMIT</button>
            <input type="hidden" name="_" value="{{ url()->current() }}">
            @if(Request()->replyTo)<input type="hidden" name="parent_id" value="{{ Request()->replyTo }}">@endif
        </form>
        @include('blog::post.comment-list')
        @if(!$commentList->hasPages())
            <div class="lists-navigator clearfix">
            </div>
        @endif
        {!! preg_replace("~(\b/commentPage-\d+)?\?commentPage=~", '/commentPage-', $commentList->render()) !!}
    </div>
</div>