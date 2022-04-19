<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Data\Repositories;

use App\Containers\BlogSection\ArticleContainer\Data\Entities\Author as AuthorEntity;
use App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces\AuthorRepositoryInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Author as AuthorModel;
use App\Ship\Core\DataTransformers\DataTransformer;
use App\Ship\Parents\Repositories\AbstractDoctrineRepository;
use Doctrine\Persistence\ManagerRegistry;

class AuthorDoctrineRepository extends AbstractDoctrineRepository implements AuthorRepositoryInterface
{
    public function __construct(ManagerRegistry $registry, private DataTransformer $dataTransformer)
    {
        parent::__construct($registry, AuthorEntity::class);
    }

    public function findById(string $id): ?AuthorModel
    {
        $entity = $this->find($id);

        return $entity ? $this->dataTransformer->entityToModel($entity, AuthorModel::class) : null;
    }

    public function save(AuthorModel $author): void
    {
        $entity = $this->dataTransformer->modelToEntity($author, AuthorEntity::class);

        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush($entity);
    }
}