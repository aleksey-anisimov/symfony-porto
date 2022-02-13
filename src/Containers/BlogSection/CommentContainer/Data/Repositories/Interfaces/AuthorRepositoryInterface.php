<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Data\Repositories\Interfaces;

use App\Containers\BlogSection\CommentContainer\Models\Interfaces\AuthorInterface;
use Symfony\Component\Uid\Uuid;

interface AuthorRepositoryInterface
{
    public function findById(Uuid $id): ?AuthorInterface;
}