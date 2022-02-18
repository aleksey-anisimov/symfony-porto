<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Data\Repositories;

use App\Containers\BlogSection\ArticleContainer\Data\Entities\Article as ArticleEntity;
use App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Article;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Ship\Parents\Repositories\AbstractDoctrineRepository;
use Doctrine\Persistence\ManagerRegistry;

class ArticleDoctrineRepository extends AbstractDoctrineRepository implements ArticleRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function findById(string $id): ?ArticleInterface
    {
        $entity = $this->find($id);

        if ($entity) {
            return new Article($entity->getId(), $entity->getTitle(), $entity->getText(), $entity->getAuthor());
        }

        return null;
    }

    public function findList(): array
    {
        $entities = $this->findAll();

        return array_map(
            static function (ArticleEntity $entity) {
                return new Article($entity->getId(), $entity->getTitle(), $entity->getText(), $entity->getAuthor());
            },
            $entities
        );
    }

    public function save(ArticleInterface $article): void
    {
        $entity = ArticleEntity::createFromModel($article);

        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush($entity);
    }
}