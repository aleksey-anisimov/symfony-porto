<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces;

use App\Containers\SecuritySection\SecurityUserContainer\Models\Interfaces\SecurityUserInterface;

interface SaveSecurityUserTaskInterface
{
    public function run(SecurityUserInterface $securityUser): void;
}