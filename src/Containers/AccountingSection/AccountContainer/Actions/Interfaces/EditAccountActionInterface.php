<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Actions\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Models\AbstractAccount;
use App\Containers\AccountingSection\AccountContainer\Values\EditAccountValue;

interface EditAccountActionInterface
{
    public function run(EditAccountValue $editAccountValue): AbstractAccount;
}