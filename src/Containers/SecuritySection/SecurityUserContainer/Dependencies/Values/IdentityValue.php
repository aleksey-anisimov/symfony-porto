<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Values;

use App\Ship\Parents\Values\AbstractValue;
use Symfony\Component\Uid\Uuid;

class IdentityValue extends AbstractValue
{
    public ?Uuid $id = null;

    public ?string $email = null;
}