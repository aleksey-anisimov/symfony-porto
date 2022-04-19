<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Models\Owner;

interface SaveOwnerTaskInterface
{
    public function run(Owner $owner): void;
}