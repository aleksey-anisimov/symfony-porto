<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Article;

interface SaveArticleTaskInterface
{
    public function run(Article $article): void;
}