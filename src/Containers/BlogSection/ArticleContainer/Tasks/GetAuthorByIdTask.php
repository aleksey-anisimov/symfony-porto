<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Tasks;

use App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces\AuthorRepositoryInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\GetAuthorByIdTaskInterface;

class GetAuthorByIdTask implements GetAuthorByIdTaskInterface
{
    public function __construct(private AuthorRepositoryInterface $repository)
    {
    }

    public function run(string $id): ?AuthorInterface
    {
        return $this->repository->findById($id);
    }
}