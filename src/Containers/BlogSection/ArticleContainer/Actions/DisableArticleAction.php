<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\DisableArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Article;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\SaveArticleTaskInterface;

class DisableArticleAction implements DisableArticleActionInterface
{
    private SaveArticleTaskInterface $saveArticleTask;

    public function __construct(SaveArticleTaskInterface $saveArticleTask)
    {
        $this->saveArticleTask = $saveArticleTask;
    }

    public function run(Article $article): void
    {
        $article->disable();

        $this->saveArticleTask->run($article);
    }
}