<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Models;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use App\Ship\Parents\Models\AbstractModel;

class Author extends AbstractModel implements AuthorInterface
{
    public function __construct(private string $id, private ?string $firstname)
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function rename(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }
}