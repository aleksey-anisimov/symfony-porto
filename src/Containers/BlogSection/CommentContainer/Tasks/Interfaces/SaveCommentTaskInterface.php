<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Tasks\Interfaces;

use App\Containers\BlogSection\CommentContainer\Models\Interfaces\CommentInterface;

interface SaveCommentTaskInterface
{
    public function run(CommentInterface $comment): void;
}