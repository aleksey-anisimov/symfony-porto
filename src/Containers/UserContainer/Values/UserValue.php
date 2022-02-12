<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Values;

use App\Ship\Parents\Values\AbstractValue;
use Symfony\Component\Uid\Uuid;

class UserValue extends AbstractValue
{
    public ?Uuid $id = null;

    public ?string $email = null;

    public ?string $firstname = null;
}
