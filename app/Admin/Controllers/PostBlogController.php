<?php

namespace App\Admin\Controllers;

use App\PostBlog;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PostBlogController extends Controller
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

            $content->header('Post');
//            $content->description('description');

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

            $content->body(Admin::show(PostBlog::findOrFail($id), function (Show $show) {

                $show->id();

                $show->created_at();
                $show->updated_at();
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
        return Admin::grid(PostBlog::class, function (Grid $grid) {
            /** @var $grid PostBlog*/

            $grid->post_id('ID')->sortable();
            $grid->post_name();
            $grid->slug();
            $grid->content();
            $grid->comment_num('评论')->sortable()
                ->setAttributes(['style' => 'min-width:45px;text-align:center;']);
            $grid->status('状态')->display(function ($status) {
                return PostBlog::$status_map[$status];
            })->setAttributes(['style' => 'width:60px;text-align:center;']);
            $grid->created_at('创建时间')->display(function ($time) {
                return date('Y-m-d H:i:s', $time);
            })->setAttributes(['style' => 'width:85px;']);
            $grid->updated_at('修改时间')->display(function ($time) {
                return date('Y-m-d H:i:s', $time);
            })->setAttributes(['style' => 'width:85px;!important']);
        })->setTitle('Post List');
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(PostBlog::class, function (Form $form) {

            $form->id('post_id', 'ID');
            $form->text('post_name');
            $form->text('slug');
            $form->textarea('content');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
