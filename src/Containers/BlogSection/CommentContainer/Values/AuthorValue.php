<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Values;

use App\Ship\Parents\Values\AbstractValue;

class AuthorValue extends AbstractValue
{
    public string $id;

    public ?string $firstname = null;
}
