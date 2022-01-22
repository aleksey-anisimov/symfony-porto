<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;

interface EnableArticleActionInterface
{
    public function run(ArticleInterface $article): void;
}