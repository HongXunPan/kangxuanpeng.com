<div id="post-bottom-bar" class="post-bottom-bar">
    <div class="bottom-bar-inner">
        <!--share-->
        <div class="bottom-bar-items social-share left">
            <span class="bottom-bar-item">Share : </span>
            <span class="bottom-bar-item bottom-bar-facebook"><a
                        href="https://www.facebook.com/sharer/sharer.php?u={{ url()->full() }}"
                        target="_blank" title="title" rel="nofollow">facebook</a></span>
            <span class="bottom-bar-item bottom-bar-twitter"><a
                        href="https://twitter.com/intent/tweet?url={{ url()->full() }}&text={{ $post->post_name }}"
                        target="_blank" title="title" rel="nofollow">Twitter</a></span>
            <span class="bottom-bar-item bottom-bar-weibo"><a
                        href="http://service.weibo.com/share/share.php?url={{ url()->full() }}&title={{ $post->post_name }}"
                        target="_blank" title="title" rel="nofollow">Weibo</a></span>
            <span class="bottom-bar-item bottom-bar-qrcode"><a
                        rel="nofollow">QRcode</a></span>
            <div id="qrcode" title="{{ url()->full() }}">
                <img style="display: block;" src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data={{ url()->full() }}"></div>
        </div>
        <!--button nav-->
        <div class="bottom-bar-items right">
            <!--to prev post-->
            @if($post->prev_post)
            <span class="bottom-bar-item"><a href="{{url('post/')}}/{{ $post->prev_post->post_id }}/{{ $post->prev_post->slug }}"
                                             title="Prev Post">←</a></span>
            @endif
            @if($post->next_post)
            <span class="bottom-bar-item"><a
                        href="{{ url('post/') }}/{{ $post->next_post->post_id }}/{{ $post->next_post->slug }}"
                        title="Next Post">→</a></span>
            @endif
            <span class="bottom-bar-item"><a href="#footer">↓</a></span>
            <span class="bottom-bar-item"><a href="#">↑</a></span>
        </div>
    </div>
</div>