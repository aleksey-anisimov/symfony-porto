<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Values;

use App\Ship\Parents\Values\AbstractValue;

class UserValue extends AbstractValue
{
    public ?string $id = null;

    public ?string $email = null;

    public ?string $firstname = null;
}
