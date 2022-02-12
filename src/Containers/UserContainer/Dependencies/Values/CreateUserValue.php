<?php

namespace App\Containers\UserContainer\Dependencies\Values;

use App\Ship\Parents\Values\AbstractValue;
use Symfony\Component\Uid\Uuid;

class CreateUserValue extends AbstractValue
{
    public ?Uuid $id = null;

    public string $email;

    public string $firstname;
}