<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Tasks\Interfaces;

use App\Containers\BlogSection\CommentContainer\Models\Article;

interface GetArticleByIdTaskInterface
{
    public function run(string $id): ?Article;
}