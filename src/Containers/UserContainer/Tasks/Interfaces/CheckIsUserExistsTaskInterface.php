<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Tasks\Interfaces;

interface CheckIsUserExistsTaskInterface
{
    public function run(string $email): bool;
}