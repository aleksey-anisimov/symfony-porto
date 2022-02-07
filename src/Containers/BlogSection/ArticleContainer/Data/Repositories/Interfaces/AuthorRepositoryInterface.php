<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use Symfony\Component\Uid\Uuid;

interface AuthorRepositoryInterface
{
    public function findById(Uuid $id): ?AuthorInterface;
}