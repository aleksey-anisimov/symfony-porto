<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Author;

interface AuthorRepositoryInterface
{
    public function findById(string $id): ?Author;

    public function save(Author $author): void;
}