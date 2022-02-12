<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions\Interfaces;

interface GetArticlesActionInterface
{
    public function run(): array;
}