<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Actions\Interfaces;

use App\Containers\SecuritySection\RegistrationContainer\Values\UserValue;

interface RegisterUserActionInterface
{
    public function run(UserValue $userValue): bool;
}