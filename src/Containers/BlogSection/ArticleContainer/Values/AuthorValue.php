<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Values;

use App\Ship\Parents\Values\AbstractValue;

class AuthorValue extends AbstractValue
{
    public string $id;

    public ?string $firstname = null;
}
