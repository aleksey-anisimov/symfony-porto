<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Tasks;

use App\Containers\BlogSection\CommentContainer\Data\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Containers\BlogSection\CommentContainer\Models\Article;
use App\Containers\BlogSection\CommentContainer\Tasks\Interfaces\GetArticleByIdTaskInterface;

class GetArticleByIdTask implements GetArticleByIdTaskInterface
{
    public function __construct(private ArticleRepositoryInterface $repository)
    {
    }

    public function run(string $id): ?Article
    {
        return $this->repository->findById($id);
    }
}