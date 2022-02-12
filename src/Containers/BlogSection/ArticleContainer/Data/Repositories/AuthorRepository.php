<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Data\Repositories;

use App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces\AuthorRepositoryInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Author;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use App\Ship\Parents\Repositories\AbstractRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Uuid;

class AuthorRepository extends AbstractRepository implements AuthorRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Author::class);
    }

    public function findById(Uuid $id): ?AuthorInterface
    {
        return $this->find($id);
    }
}