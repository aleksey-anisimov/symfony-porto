<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\ArticleContainer\Values\ArticleValue;

interface CreateArticleActionInterface
{
    public function run(ArticleValue $articleValue): ArticleInterface;
}