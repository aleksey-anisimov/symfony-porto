<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Data\Repositories;

use App\Containers\BlogSection\CommentContainer\Data\Repositories\Interfaces\CommentRepositoryInterface;
use App\Containers\BlogSection\CommentContainer\Models\Comment;
use App\Containers\BlogSection\CommentContainer\Models\Interfaces\CommentInterface;
use App\Ship\Parents\Repositories\AbstractRepository;
use Doctrine\Persistence\ManagerRegistry;

class CommentRepository extends AbstractRepository implements CommentRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Comment::class);
    }

    public function findById(string $id): ?CommentInterface
    {
        return $this->find($id);
    }

    public function save(CommentInterface $comment): void
    {
        $this->getEntityManager()->persist($comment);
        $this->getEntityManager()->flush($comment);
    }
}