<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\EnableArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Article;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\SaveArticleTaskInterface;

class EnableArticleAction implements EnableArticleActionInterface
{
    private SaveArticleTaskInterface $saveArticleTask;

    public function __construct(SaveArticleTaskInterface $saveArticleTask)
    {
        $this->saveArticleTask = $saveArticleTask;
    }

    public function run(Article $article): void
    {
        $article->enable();

        $this->saveArticleTask->run($article);
    }
}