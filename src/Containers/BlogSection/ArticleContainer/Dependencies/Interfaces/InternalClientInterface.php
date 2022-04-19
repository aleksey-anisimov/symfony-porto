<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Dependencies\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Author;

interface InternalClientInterface
{
    public function getAuthorById(string $id): Author;
}