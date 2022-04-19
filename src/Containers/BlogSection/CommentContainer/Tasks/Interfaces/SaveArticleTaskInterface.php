<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Tasks\Interfaces;

use App\Containers\BlogSection\CommentContainer\Models\Article;

interface SaveArticleTaskInterface
{
    public function run(Article $article): void;
}