<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Article;

interface ArticleRepositoryInterface
{
    public function findById(string $id): ?Article;

    public function findList(): array;

    public function save(Article $article): void;
}