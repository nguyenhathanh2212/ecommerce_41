<?php
namespace App\Repositories\Comment;

interface CommentInterface
{
    public function getComments($id);

    public function getSubComments($id);
}
