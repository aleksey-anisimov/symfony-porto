<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Models;

use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\AccountInterface;
use App\Ship\Parents\Models\AbstractModel;
use Symfony\Component\Uid\Uuid;

class Account extends AbstractModel implements AccountInterface
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