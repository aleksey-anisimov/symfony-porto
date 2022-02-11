<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Tasks\Interfaces;

use Symfony\Component\Uid\Uuid;

interface SendUserRegisteredEventTaskInterface
{
    public function run(Uuid $id): bool;
}