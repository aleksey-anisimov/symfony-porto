<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Tasks;

use App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\GetArticleByIdTaskInterface;

class GetArticleByIdTask implements GetArticleByIdTaskInterface
{
    public function __construct(private ArticleRepositoryInterface $repository)
    {
    }

    public function run(string $id): ?ArticleInterface
    {
        return $this->repository->findById($id);
    }
}