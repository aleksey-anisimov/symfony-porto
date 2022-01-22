<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;

interface SaveArticleTaskInterface
{
    public function run(ArticleInterface $article): void;
}