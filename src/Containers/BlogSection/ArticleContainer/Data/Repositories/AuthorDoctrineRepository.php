<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Data\Repositories;

use App\Containers\BlogSection\ArticleContainer\Data\Entities\Author as AuthorEntity;
use App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces\AuthorRepositoryInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Author;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use App\Ship\Parents\Repositories\AbstractDoctrineRepository;
use Doctrine\Persistence\ManagerRegistry;

class AuthorDoctrineRepository extends AbstractDoctrineRepository implements AuthorRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Author::class);
    }

    public function findById(string $id): ?AuthorInterface
    {
        $entity = $this->find($id);

        return $entity ? new Author($entity->getId(), $entity->getFirstname()) : null;
    }

    public function save(AuthorInterface $author): void
    {
        $entity = AuthorEntity::createFromModel($author);

        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush($entity);
    }
}