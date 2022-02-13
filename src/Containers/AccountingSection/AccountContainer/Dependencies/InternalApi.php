<?php

namespace App\Containers\AccountingSection\AccountContainer\Dependencies;

use App\Containers\AccountingSection\AccountContainer\Dependencies\Interfaces\InternalApiInterface;
use App\Ship\Parents\Dependencies\AbstractInternalApi;

class InternalApi extends AbstractInternalApi implements InternalApiInterface
{
    public function isIncomingPaymentAllowed(string $accountId): bool
    {
        // TODO: call validator
        return true;
    }

    public function isOutgoingPaymentAllowed(string $accountId): bool
    {
        // TODO: call validator
        return true;
    }
}