<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\EnableArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\SaveArticleTaskInterface;

class EnableArticleAction implements EnableArticleActionInterface
{
    private SaveArticleTaskInterface $saveArticleTask;

    public function __construct(SaveArticleTaskInterface $saveArticleTask)
    {
        $this->saveArticleTask = $saveArticleTask;
    }

    public function run(ArticleInterface $article): void
    {
        $article->setDisabled(false);

        $this->saveArticleTask->run($article);
    }
}