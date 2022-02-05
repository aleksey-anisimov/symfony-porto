<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Tasks\Interfaces;

interface HashPasswordTaskInterface
{
    public function run(string $password): string;
}