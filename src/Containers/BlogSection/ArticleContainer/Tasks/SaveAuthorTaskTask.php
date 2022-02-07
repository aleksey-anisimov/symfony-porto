<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Tasks;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\SaveAuthorTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;
use Doctrine\ORM\EntityManagerInterface;

class SaveAuthorTaskTask extends AbstractTask implements SaveAuthorTaskInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function run(AuthorInterface $author): void
    {
        $this->entityManager->persist($author);
        $this->entityManager->flush($author);
    }
}