<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Tasks;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\SaveArticleTaskInterface;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\SaveAuthorTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;
use Doctrine\ORM\EntityManagerInterface;

class SaveAuthorTaskTask extends AbstractTask implements SaveAuthorTaskInterface
{
    public function run(AuthorInterface $author): void
    {
        // TODO: Implement run() method.
    }
}