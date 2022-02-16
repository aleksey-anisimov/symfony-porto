<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\CreateArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Article;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\GetAuthorByIdTaskInterface;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\SaveArticleTaskInterface;
use App\Containers\BlogSection\ArticleContainer\Values\CreateArticleValue;

class CreateArticleAction implements CreateArticleActionInterface
{
    public function __construct(
        private GetAuthorByIdTaskInterface $getAuthorByIdTask,
        private SaveArticleTaskInterface $saveArticleTask
    ) {
    }

    public function run(CreateArticleValue $articleValue): ArticleInterface
    {
        $article = new Article();
        $article->setTitle($articleValue->getTitle());
        $article->setText($articleValue->getText());
        $article->setAuthor($this->getAuthorByIdTask->run($articleValue->getAuthorId()));

        $this->saveArticleTask->run($article);

        return $article;
    }
}