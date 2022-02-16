<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;

interface GetAuthorByIdTaskInterface
{
    public function run(string $id): ?AuthorInterface;
}