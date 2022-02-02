<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Dependencies\Interfaces;

use Symfony\Component\Uid\Uuid;

interface InternalApiInterface
{
    public function isIncomingPaymentAllowed(Uuid $accountId): bool;

    public function isOutgoingPaymentAllowed(Uuid $accountId): bool;
}