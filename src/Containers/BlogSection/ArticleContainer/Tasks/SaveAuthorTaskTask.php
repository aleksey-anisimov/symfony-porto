<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Tasks;

use App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces\AuthorRepositoryInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\SaveAuthorTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class SaveAuthorTaskTask extends AbstractTask implements SaveAuthorTaskInterface
{
    public function __construct(private AuthorRepositoryInterface $repository)
    {
    }

    public function run(AuthorInterface $author): void
    {
        $this->repository->save($author);
    }
}