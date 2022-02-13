<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Tasks;

use App\Containers\BlogSection\CommentContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\CommentContainer\Tasks\Interfaces\SaveArticleTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;
use Doctrine\ORM\EntityManagerInterface;

class SaveArticleTask extends AbstractTask implements SaveArticleTaskInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function run(ArticleInterface $article): void
    {
        $this->entityManager->persist($article);
        $this->entityManager->flush($article);
    }
}