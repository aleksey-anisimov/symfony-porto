<?php

namespace App\Containers\UserContainer\Dependencies\Values;

use App\Ship\Parents\Values\AbstractValue;

class CreateUserValue extends AbstractValue
{
    public ?string $id = null;

    public string $email;

    public string $firstname;
}