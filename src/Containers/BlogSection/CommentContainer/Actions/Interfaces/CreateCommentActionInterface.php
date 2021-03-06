<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Actions\Interfaces;

use App\Containers\BlogSection\CommentContainer\Models\Comment;
use App\Containers\BlogSection\CommentContainer\Values\CommentValue;

interface CreateCommentActionInterface
{
    public function run(CommentValue $commentValue): Comment;
}