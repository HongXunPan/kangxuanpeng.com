<?php

namespace App\Admin\Controllers;

use App\PostBlog;
use App\PostTagRelationBlog;
use App\Http\Controllers\Controller;
use App\TagBlog;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PostTagBlogController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Index');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Show interface.
     *
     * @param $id
     * @return Content
     */
    public function show($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Detail');
            $content->description('description');

            $content->body(Admin::show(PostTagRelationBlog::findOrFail($id), function (Show $show) {

                $show->id();
                $show->post()->post_name();
                $show->post_id();
                $show->tag()->tag_name();
                $show->tag_id();

            }));
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Edit');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('Create');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(PostTagRelationBlog::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->post()->post_name()->sortable();
            $grid->post_id();
            $grid->tag()->tag_name();
            $grid->tag_id();

            $grid->filter(function ($filter){
                $filter->equal('post_id');
                $filter->equal('tag_id');
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(PostTagRelationBlog::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->select('post_id')->options(function ($post_id) {
                /** @var  $post PostBlog*/
                $post = PostBlog::find($post_id);

                if ($post) {
                    return [$post->post_id => $post->post_name];
                }
            })->ajax('/admin/api/posts');

            $form->select('tag_id')->options(function ($tag_id) {
                /** @var TagBlog $tag */
                $tag = TagBlog::find($tag_id);

                if ($tag) {
                    return [$tag->tag_id => $tag->tag_name];
                }
            })->ajax('/admin/api/tags');
        });
    }
}
