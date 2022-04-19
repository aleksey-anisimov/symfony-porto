<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Data\Repositories;

use App\Containers\BlogSection\ArticleContainer\Data\Entities\Article as ArticleEntity;
use App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Article as ArticleModel;
use App\Ship\Core\DataTransformers\DataTransformer;
use App\Ship\Parents\Repositories\AbstractDoctrineRepository;
use Doctrine\Persistence\ManagerRegistry;

class ArticleDoctrineRepository extends AbstractDoctrineRepository implements ArticleRepositoryInterface
{
    public function __construct(ManagerRegistry $registry, private DataTransformer $dataTransformer)
    {
        parent::__construct($registry, ArticleEntity::class);
    }

    public function findById(string $id): ?ArticleModel
    {
        $entity = $this->find($id);

        return $entity ? $this->dataTransformer->entityToModel($entity, ArticleModel::class) : null;
    }

    public function findList(): array
    {
        $entities = $this->findAll();

        return array_map(
            function (ArticleEntity $entity) {
                return $this->dataTransformer->entityToModel($entity, ArticleModel::class);
            },
            $entities
        );
    }

    public function save(ArticleModel $article): void
    {
        $entity = $this->dataTransformer->modelToEntity($article, ArticleEntity::class);

        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush($entity);
    }
}