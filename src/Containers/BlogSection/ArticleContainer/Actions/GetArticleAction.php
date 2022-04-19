<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\GetArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Article;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\GetArticleByIdTaskInterface;
use App\Ship\Parents\Actions\AbstractAction;

class GetArticleAction extends AbstractAction implements GetArticleActionInterface
{
    public function __construct(private GetArticleByIdTaskInterface $getArticleByIdTask)
    {
    }

    public function run(string $id): ?Article
    {
        return $this->getArticleByIdTask->run($id);
    }
}