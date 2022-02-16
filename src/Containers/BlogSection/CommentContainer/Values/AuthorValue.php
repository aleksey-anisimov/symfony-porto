<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Values;

use App\Ship\Parents\Values\AbstractValue;

class AuthorValue extends AbstractValue
{
    public function __construct(private string $id, private ?string $firstname = null)
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
}
