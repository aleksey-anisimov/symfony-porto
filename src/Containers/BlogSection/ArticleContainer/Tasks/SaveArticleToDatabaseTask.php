<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Tasks;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\SaveArticleTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;
use Doctrine\ORM\EntityManagerInterface;

class SaveArticleToDatabaseTask extends AbstractTask implements SaveArticleTaskInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function run(ArticleInterface $article): void
    {
        // TODO: create doctrine entities and save to database
        $this->entityManager->flush();
    }
}