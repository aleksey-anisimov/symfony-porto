<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Tasks;

use App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Article;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\SaveArticleTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class SaveArticleTask extends AbstractTask implements SaveArticleTaskInterface
{
    public function __construct(private ArticleRepositoryInterface $repository)
    {
    }

    public function run(Article $article): void
    {
        $this->repository->save($article);
    }
}