<div style="color:#555;font:12px/1.5 微软雅黑,Tahoma,Helvetica,Arial,sans-serif;width:650px;margin:50px auto;border-top: none;box-shadow:0 0px 3px #aaaaaa;">
    <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr valign="top" height="2">
            <td valign="top">
                <div style="background-color:white;border-top: 2px solid #eb5055;box-shadow: 0 1px 3px #AAAAAA;line-padding:0 15px 12px;width:650px;color:#555555;font-family:微软雅黑, Arial;font-size:12px;margin: 0 auto;">
                    <h2 style="border-bottom:1px solid #DDD;font-size:14px;font-weight:normal;padding:8px 0 10px 8px;"><span
                                style="color: #eb5055;font-weight: bold;">&gt; </span>您在 <a
                                style="text-decoration:none;color: #eb5055;font-weight:600;"
                                href="http://blog.kangxuanpeng.com">HongXunPan</a>
                        博客上的留言有回复啦！</h2>
                    <div style="padding:0 12px 0 12px;margin-top:18px">
                        <p>您好, {{ $comment->nick_name }}! 您发表在文章 《{{ $post->post_name }}》 的评论:</p>
                        <p style="background-color: #EEE;border: 1px solid #DDD;padding: 20px;margin: 15px 0;">
                            {{ $comment->content }}</p>
                        <p>{{ $reply->nick_name }} 给您的回复如下:</p>
                        <p style="background-color: #EEE;border: 1px solid #DDD;padding: 20px;margin: 15px 0;">
                            {{ $reply->content }}</p>
                        <p>您可以点击 <a style="text-decoration:none; color:#5692BC"
                                    href="{{ url('post/').'/'.$post->post_id.'/'.$post->slug }}#comments"
                                    target="_blank">这里查看回复的完整內容</a>，也欢迎再次光临
                            <a style="text-decoration:none; color:#5692BC" href="http://blog.kangxuanpeng.com">HongXunPan</a>。祝您天天开心，欢迎下次访问！谢谢。
                        </p>
                        <p style="padding-bottom: 15px;">(此邮件由系统自动发出, 请勿回复)</p></div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>