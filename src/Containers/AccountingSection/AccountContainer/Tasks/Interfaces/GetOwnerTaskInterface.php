<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\OwnerInterface;

interface GetOwnerTaskInterface
{
    public function run(string $id): ?OwnerInterface;
}