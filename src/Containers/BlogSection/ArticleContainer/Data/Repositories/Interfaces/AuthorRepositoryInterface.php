<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;

interface AuthorRepositoryInterface
{
    public function findById(string $id): ?AuthorInterface;
}