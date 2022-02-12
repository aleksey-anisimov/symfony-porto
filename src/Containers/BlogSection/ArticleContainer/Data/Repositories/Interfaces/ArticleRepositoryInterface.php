<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use Symfony\Component\Uid\Uuid;

interface ArticleRepositoryInterface
{
    public function findById(Uuid $id): ?ArticleInterface;

    public function findList(): array;
}