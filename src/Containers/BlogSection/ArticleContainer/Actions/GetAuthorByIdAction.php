<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\GetAuthorByIdActionInterface;
use App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces\AuthorRepositoryInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;

class GetAuthorByIdAction implements GetAuthorByIdActionInterface
{
    public function __construct(private AuthorRepositoryInterface $repository)
    {
    }

    public function run(string $id): ?AuthorInterface
    {
        return $this->repository->findById($id);
    }
}