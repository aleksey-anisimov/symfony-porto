<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Article;

interface GetArticleActionInterface
{
    public function run(string $id): ?Article;
}