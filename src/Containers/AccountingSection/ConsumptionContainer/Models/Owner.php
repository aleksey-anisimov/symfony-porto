<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\ConsumptionContainer\Models;

use App\Containers\AccountingSection\WalletContainer\Models\Interfaces\OwnerInterface;
use App\Ship\Parents\Models\AbstractModel;
use Symfony\Component\Uid\Uuid;

class Owner extends AbstractModel implements OwnerInterface
{
    private Uuid $id;

    public function __construct(?Uuid $id = null)
    {
        $this->id = $id ?: Uuid::v4();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }
}