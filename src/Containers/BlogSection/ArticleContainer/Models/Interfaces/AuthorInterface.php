<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Models\Interfaces;

interface AuthorInterface
{
    public function getId(): string;

    public function getFirstname(): ?string;
}