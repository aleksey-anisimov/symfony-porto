<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Tasks;

use App\Containers\BlogSection\CommentContainer\Data\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Containers\BlogSection\CommentContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\CommentContainer\Tasks\Interfaces\SaveArticleTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class SaveArticleTask extends AbstractTask implements SaveArticleTaskInterface
{
    public function __construct(private ArticleRepositoryInterface $repository)
    {
    }

    public function run(ArticleInterface $article): void
    {
        $this->repository->save($article);
    }
}