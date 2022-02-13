<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\OwnerInterface;

interface SaveOwnerTaskInterface
{
    public function run(OwnerInterface $owner): void;
}