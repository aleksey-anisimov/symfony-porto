<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;

interface GetAuthorByIdActionInterface
{
    public function run(string $id): ?AuthorInterface;
}