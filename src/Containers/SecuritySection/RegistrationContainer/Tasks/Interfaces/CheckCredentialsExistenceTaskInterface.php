<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Tasks\Interfaces;

use App\Containers\SecuritySection\RegistrationContainer\Values\UserValue;

interface CheckCredentialsExistenceTaskInterface
{
    public function run(UserValue $userValue): bool;
}