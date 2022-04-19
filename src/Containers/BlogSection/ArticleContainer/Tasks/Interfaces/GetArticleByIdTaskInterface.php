<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Article;

interface GetArticleByIdTaskInterface
{
    public function run(string $id): ?Article;
}