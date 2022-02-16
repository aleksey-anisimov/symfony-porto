<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Data\Repositories\Interfaces;

use App\Containers\BlogSection\CommentContainer\Models\Interfaces\CommentInterface;

interface CommentRepositoryInterface
{
    public function findById(string $id): ?CommentInterface;

    public function save(CommentInterface $comment): void;
}