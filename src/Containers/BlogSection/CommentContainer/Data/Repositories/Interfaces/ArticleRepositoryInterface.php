<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Data\Repositories\Interfaces;

use App\Containers\BlogSection\CommentContainer\Models\Article;

interface ArticleRepositoryInterface
{
    public function findById(string $id): ?Article;

    public function save(Article $article): void;
}