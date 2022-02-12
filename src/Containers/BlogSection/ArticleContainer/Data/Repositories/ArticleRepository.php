<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Data\Repositories;

use App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Article;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Ship\Parents\Repositories\AbstractRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Uuid;

class ArticleRepository extends AbstractRepository implements ArticleRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function findById(Uuid $id): ?ArticleInterface
    {
        return $this->find($id);
    }

    public function findList(): array
    {
        return $this->findAll();
    }
}