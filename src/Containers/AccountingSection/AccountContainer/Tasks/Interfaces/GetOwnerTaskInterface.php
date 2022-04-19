<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Models\Owner;

interface GetOwnerTaskInterface
{
    public function run(string $id): ?Owner;
}