<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Data\Repositories\Interfaces;

use App\Containers\BlogSection\CommentContainer\Models\Comment;

interface CommentRepositoryInterface
{
    public function findById(string $id): ?Comment;

    public function save(Comment $comment): void;
}