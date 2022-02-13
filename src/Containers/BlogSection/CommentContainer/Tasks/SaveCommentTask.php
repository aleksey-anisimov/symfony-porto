<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Tasks;

use App\Containers\BlogSection\CommentContainer\Models\Interfaces\CommentInterface;
use App\Containers\BlogSection\CommentContainer\Tasks\Interfaces\SaveCommentTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;
use Doctrine\ORM\EntityManagerInterface;

class SaveCommentTask extends AbstractTask implements SaveCommentTaskInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function run(CommentInterface $comment): void
    {
        $this->entityManager->persist($comment);
        $this->entityManager->flush($comment);
    }
}