<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Models;

use App\Containers\AccountingSection\AccountContainer\Values\AccountTypeEnum;
use Symfony\Component\Uid\Uuid;

class Income extends AbstractAccount
{
    public function __construct(?Uuid $id = null)
    {
        $this->id = $id ?: Uuid::v4();
        $this->type = AccountTypeEnum::INCOME;
    }
}