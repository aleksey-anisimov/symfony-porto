<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Tasks;

use App\Containers\BlogSection\CommentContainer\Data\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Containers\BlogSection\CommentContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\CommentContainer\Tasks\Interfaces\GetArticleByIdTaskInterface;
use Symfony\Component\Uid\Uuid;

class GetArticleByIdTask implements GetArticleByIdTaskInterface
{
    public function __construct(private ArticleRepositoryInterface $repository)
    {
    }

    public function run(Uuid $id): ?ArticleInterface
    {
        return $this->repository->findById($id);
    }
}