<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\CreateArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Article;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\SaveArticleTaskInterface;
use App\Containers\BlogSection\ArticleContainer\Values\ArticleValue;

class CreateArticleAction implements CreateArticleActionInterface
{
    private SaveArticleTaskInterface $saveArticleTask;

    public function __construct(SaveArticleTaskInterface $saveArticleTask)
    {
        $this->saveArticleTask = $saveArticleTask;
    }

    public function run(ArticleValue $articleValue): ArticleInterface
    {
        $article = new Article();
        $article->setTitle($articleValue->title);
        $article->setText($articleValue->text);
        $article->setAuthor($articleValue->author);

        $this->saveArticleTask->run($article);

        return $article;
    }
}