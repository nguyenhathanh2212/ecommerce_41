<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Comment\CommentInterface;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    protected $commentRepository;

    public function __construct(CommentInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->middleware('auth');
    }

    public function addComment(Request $request)
    {
        try {
            $comment = $request->only('content');
            $comment['parent_id'] = config('setting.num0');
            $comment['user_id'] = Auth::user()->id;
            $comment['product_id'] = $request->id;
            $this->commentRepository->create($comment);
            $comments = $this->commentRepository->getComments($request->id);

            return view('ecommerce.product.comment', compact('comments'));
        } catch (Exception $e) {
            return trans('lang.error');
        }
    }

    public function addSubComment(Request $request)
    {
        try {
            $comment['content'] = $request->content;
            $comment['parent_id'] = $request->parent_id;
            $comment['user_id'] = Auth::user()->id;
            $comment['product_id'] = $request->id;
            $this->commentRepository->create($comment);
            $subComments = $this->commentRepository->getSubComments($request->parent_id);

            return view('ecommerce.product.subcomment', compact('subComments'));
        } catch (Exception $e) {
            return trans('lang.error');
        }
    }

    public function showComment(Request $request)
    {
        try {
            $comments = $this->commentRepository->getComments($request->id);

            return view('ecommerce.product.comment', compact('comments'));
        } catch (Exception $e) {
            return trans('lang.error');
        }
    }
}
