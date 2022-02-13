<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Tasks\Interfaces;

use App\Containers\BlogSection\CommentContainer\Models\Interfaces\ArticleInterface;

interface SaveArticleTaskInterface
{
    public function run(ArticleInterface $article): void;
}