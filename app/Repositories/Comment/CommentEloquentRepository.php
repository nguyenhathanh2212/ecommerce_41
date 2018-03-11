<?php
namespace App\Repositories\Comment;

use App\Repositories\EloquentRepository;
use App\Models\Comment;
use Session;

class CommentEloquentRepository extends EloquentRepository implements CommentInterface
{
    public function getModel()
    {
        return Comment::class;
    }

    public function getComments($id)
    {
        return $this->model->where('product_id', $id)->where('parent_id', config('setting.num0'))->orderBy('created_at', 'DESC')->paginate(config('setting.paginate_comment'));
    }

    public function getSubComments($id)
    {
        return $this->model->findOrFail($id)->sub_comments;
    }
}
