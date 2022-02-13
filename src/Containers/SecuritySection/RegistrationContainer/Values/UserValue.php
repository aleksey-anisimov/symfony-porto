<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Values;

use App\Ship\Parents\Values\AbstractValue;

class UserValue extends AbstractValue
{
    public ?string $id = null;

    public string $email;

    public string $password;

    public string $firstname;

    public array $roles = [];
}