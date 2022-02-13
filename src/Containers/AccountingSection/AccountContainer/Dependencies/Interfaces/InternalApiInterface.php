<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Dependencies\Interfaces;

interface InternalApiInterface
{
    public function isIncomingPaymentAllowed(string $accountId): bool;

    public function isOutgoingPaymentAllowed(string $accountId): bool;
}