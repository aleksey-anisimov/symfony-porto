<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Data\Repositories\Interfaces;

use App\Containers\BlogSection\CommentContainer\Models\Interfaces\ArticleInterface;
use Symfony\Component\Uid\Uuid;

interface ArticleRepositoryInterface
{
    public function findById(Uuid $id): ?ArticleInterface;
}