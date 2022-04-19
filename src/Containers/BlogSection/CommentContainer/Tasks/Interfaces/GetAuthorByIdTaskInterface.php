<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Tasks\Interfaces;

use App\Containers\BlogSection\CommentContainer\Models\Author;

interface GetAuthorByIdTaskInterface
{
    public function run(string $id): ?Author;
}