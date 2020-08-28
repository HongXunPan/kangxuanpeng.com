<?php

namespace App\Admin\Controllers;

use App\PostBlog;
use App\Http\Controllers\Controller;
use App\TagBlog;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PostBlogController extends Controller
{
    use ModelForm;

    private $states = [
        'on'  => ['value' => PostBlog::STATUS_PUBLISHED, 'text' => '发布'],
        'off' => ['value' => PostBlog::STATUS_EDITING, 'text' => '草稿'],
    ];

    private $indexShowStates = [
        'on' => ['value' => PostBlog::IS_INDEX_SHOW, 'text' => '显示'],
        'off' => ['value' => PostBlog::IS_INDEX_NOT_SHOW, 'text' => '不显示'],
    ];

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

                $show->post_id();
                $show->post_name();
                $show->slug();
                $show->all();
                $show->created_at();
                $show->updated_at();

                $show->postTags('postTags', function ($postTags) {
                    $postTags->resource('../../admin/post-tags');
                    $postTags->id();
                    $postTags->tag_id();
                    $postTags->tag()->tag_name();

                    $postTags->disablePagination();
                    $postTags->disableExport();
                    $postTags->disableCreateButton();
                });
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
            $grid->model()->orderBy('create_at', 'desc');

            $grid->post_id('ID')->sortable();
            $grid->post_name()->editable()->setAttributes(['style' => 'max-width:200px;overflow:hidden;text-overflow:ellipsis;']);
            $grid->slug()->editable();
            $grid->content();
            $grid->comment_num('评论')->sortable()
                ->setAttributes(['style' => 'min-width:45px;text-align:center;']);
            $grid->status('状态')->switch($this->states)->setAttributes(['style' => 'width:60px;text-align:center;']);
            $grid->is_index_show('首页显示')->switch($this->indexShowStates)->setAttributes(['style' => 'width:60px;text-align:center;']);
            $grid->created_at()->display(function ($time) {
                return date('Y-m-d H:i:s', $time);
            })->setAttributes(['class' => 'created_at'])->sortable()->editable();
            $grid->updated_at()->display(function ($time) {
                return date('Y-m-d H:i:s', $time);
            })->setAttributes(['class' => 'updated_at'])->sortable();

            $grid->filter(function ($filter) {
                $filter->like('post_name');
                $filter->like('slug');
//                $filter->scope('status', PostBlog::$status_map[PostBlog::STATUS_PUBLISHED])->where('status', PostBlog::STATUS_PUBLISHED);
                $filter->equal('status')->select(PostBlog::$status_map);
            });
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

            $form->switch('status')->states($this->states);
            $form->switch('is_index_show')->states($this->indexShowStates);
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');

            $form->divider();
            $form->multipleSelect('tags')->options(TagBlog::all()->pluck('tag_name', 'tag_id'));

        });
    }
}
