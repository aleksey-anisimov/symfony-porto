<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Tasks\Interfaces;

use App\Containers\BlogSection\CommentContainer\Models\Comment;

interface SaveCommentTaskInterface
{
    public function run(Comment $comment): void;
}