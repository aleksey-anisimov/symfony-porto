<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Tasks\Interfaces;

interface SendUserRegisteredEventTaskInterface
{
    public function run(string $id): void;
}