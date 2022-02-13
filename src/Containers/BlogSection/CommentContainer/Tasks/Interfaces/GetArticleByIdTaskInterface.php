<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Tasks\Interfaces;

use App\Containers\BlogSection\CommentContainer\Models\Interfaces\ArticleInterface;
use Symfony\Component\Uid\Uuid;

interface GetArticleByIdTaskInterface
{
    public function run(Uuid $id): ?ArticleInterface;
}