<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Dependencies\Models;

class TransactionPublic
{
    public string $id;

    public string $sourceId;

    public string $destinationId;

    public int $value;
}