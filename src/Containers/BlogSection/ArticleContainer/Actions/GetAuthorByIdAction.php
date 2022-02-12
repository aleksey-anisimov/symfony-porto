<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\GetAuthorByIdActionInterface;
use App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces\AuthorRepositoryInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use Symfony\Component\Uid\Uuid;

class GetAuthorByIdAction implements GetAuthorByIdActionInterface
{
    public function __construct(private AuthorRepositoryInterface $repository)
    {
    }

    public function run(Uuid $id): ?AuthorInterface
    {
        return $this->repository->findById($id);
    }
}