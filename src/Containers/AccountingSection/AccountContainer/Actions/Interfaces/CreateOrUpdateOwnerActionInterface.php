<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Actions\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Models\Owner;
use App\Containers\AccountingSection\AccountContainer\Values\CreateOwnerValue;

interface CreateOrUpdateOwnerActionInterface
{
    public function run(CreateOwnerValue $ownerValue): Owner;
}