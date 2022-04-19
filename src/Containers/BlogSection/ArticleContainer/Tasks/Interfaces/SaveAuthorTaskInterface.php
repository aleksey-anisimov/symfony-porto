<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Author;

interface SaveAuthorTaskInterface
{
    public function run(Author $author): void;
}