<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Values;

use App\Ship\Parents\Values\AbstractValue;

class IdentityValue extends AbstractValue
{
    public ?string $id = null;

    public ?string $email = null;
}