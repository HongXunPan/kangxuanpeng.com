<?php
/**
 * Created by PhpStorm.
 * User: HongXunPan
 * Date: 2018/8/2
 * Time: 16:03
 */

namespace Modules\Blog\Http\Controllers;


use App\CommentBlog;
use App\Events\Event;
use App\PostBlog;
use HyperDown\Parser;
use Illuminate\Routing\Controller;
use Modules\Blog\Events\CommentNoticeEvent;
use Modules\Blog\Events\NoticeCommentatorEvent;
use Modules\Blog\Mail\NoticeCommentatorMail;

class PostController extends Controller
{
    public function index()
    {

    }

    public function postById($id)
    {
        return $this->__renderPost($id);
    }

    public function postByIdSlug($id, $slug = '')
    {
        return $this->__renderPost($id, $slug);
    }

    public function postBySlug($slug)
    {
        return $this->__renderPost(0, $slug);
    }

    private function __renderPost($id = 0, $slug = '')
    {
        $commentPage = (int)preg_replace('/\bcommentPage-/', '', request()->commentPage);
        !is_int($commentPage) && $commentPage = 1;
        $where = [];
        if ($id !== 0) {
            $where['post_id'] = $id;
        }
        if ($slug !== '') {
            $where['slug'] = $slug;
        }
        $post = PostBlog::whereStatus(PostBlog::STATUS_PUBLISHED)->where($where)->firstOrFail();
        $commentList = $post->parentComments()->orderBy('created_at', 'desc')->paginate(6, ['*'], 'commentPage', $commentPage);
        $md = new Parser();
        $md->_commonWhiteList .= '|center';
        return view('blog::index.post', ['post' => $post, 'md' => $md, 'commentList' => $commentList]);
    }

    public function about()
    {
        return $this->postBySlug('about');
    }

    public function websiteIntro()
    {
        return $this->postBySlug('website-intro');
    }

    public function comment($id)
    {
        $input = request()->all();
        $input['post_id'] = $id;
        if (!$input['site']) unset($input['site']) ;
        $res = CommentBlog::create($input);
        event(new NoticeCommentatorEvent($res));
        event(new CommentNoticeEvent($res));
        return redirect($input['_'].'#li-comment-'.$res->comment_id);
    }
}