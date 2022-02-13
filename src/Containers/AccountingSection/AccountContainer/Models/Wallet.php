<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Models;

use App\Containers\AccountingSection\AccountContainer\Values\AccountTypeEnum;
use App\Ship\Core\Generators\UuidGenerator;

class Wallet extends AbstractAccount
{
    public function __construct(?string $id = null)
    {
        $this->id = UuidGenerator::uuidString($id);
        $this->type = AccountTypeEnum::WALLET;
    }
}