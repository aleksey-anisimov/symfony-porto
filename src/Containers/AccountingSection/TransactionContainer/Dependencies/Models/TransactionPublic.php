<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Dependencies\Models;

use Symfony\Component\Uid\Uuid;

class TransactionPublic
{
    public Uuid $id;

    public Uuid $sourceId;

    public Uuid $destinationId;

    public int $value;
}