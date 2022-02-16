<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Data\Repositories;

use App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Article;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Ship\Parents\Repositories\AbstractRepository;
use Doctrine\Persistence\ManagerRegistry;

class ArticleRepository extends AbstractRepository implements ArticleRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function findById(string $id): ?ArticleInterface
    {
        return $this->find($id);
    }

    public function findList(): array
    {
        return $this->findAll();
    }

    public function save(ArticleInterface $article):void
    {
        $this->getEntityManager()->persist($article);
        $this->getEntityManager()->flush($article);
    }
}