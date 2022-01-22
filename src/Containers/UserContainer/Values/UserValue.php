<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Values;

use App\Ship\Parents\Values\AbstractValue;

class UserValue extends AbstractValue
{
    public ?string $email = null;

    public ?string $password = null;
}
