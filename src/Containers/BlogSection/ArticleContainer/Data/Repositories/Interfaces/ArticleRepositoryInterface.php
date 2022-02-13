<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;

interface ArticleRepositoryInterface
{
    public function findById(string $id): ?ArticleInterface;

    public function findList(): array;
}