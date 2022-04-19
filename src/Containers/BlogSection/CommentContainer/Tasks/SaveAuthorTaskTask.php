<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Tasks;

use App\Containers\BlogSection\CommentContainer\Data\Repositories\Interfaces\AuthorRepositoryInterface;
use App\Containers\BlogSection\CommentContainer\Models\Author;
use App\Containers\BlogSection\CommentContainer\Tasks\Interfaces\SaveAuthorTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class SaveAuthorTaskTask extends AbstractTask implements SaveAuthorTaskInterface
{
    public function __construct(private AuthorRepositoryInterface $repository)
    {
    }

    public function run(Author $author): void
    {
        $this->repository->save($author);
    }
}