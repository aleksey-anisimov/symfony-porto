<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\WalletContainer\Values;

use App\Ship\Parents\Values\AbstractValue;
use Symfony\Component\Uid\Uuid;

class WalletValue extends AbstractValue
{
    public string $name;

    public Uuid $ownerId;
}