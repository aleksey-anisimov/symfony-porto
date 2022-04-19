<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Article;
use App\Containers\BlogSection\ArticleContainer\Values\CreateArticleValue;

interface CreateArticleActionInterface
{
    public function run(CreateArticleValue $articleValue): Article;
}