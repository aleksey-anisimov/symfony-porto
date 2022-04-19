<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Tasks;

use App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces\AuthorRepositoryInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Author;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\GetAuthorByIdTaskInterface;

class GetAuthorByIdTask implements GetAuthorByIdTaskInterface
{
    public function __construct(private AuthorRepositoryInterface $repository)
    {
    }

    public function run(string $id): ?Author
    {
        return $this->repository->findById($id);
    }
}