<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Tasks\Interfaces;

use App\Containers\BlogSection\CommentContainer\Models\Interfaces\AuthorInterface;
use Symfony\Component\Uid\Uuid;

interface GetAuthorByIdTaskInterface
{
    public function run(Uuid $id): ?AuthorInterface;
}