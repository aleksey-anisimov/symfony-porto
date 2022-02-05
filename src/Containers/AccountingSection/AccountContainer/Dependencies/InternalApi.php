<?php

namespace App\Containers\AccountingSection\AccountContainer\Dependencies;

use App\Containers\AccountingSection\AccountContainer\Dependencies\Interfaces\InternalApiInterface;
use App\Ship\Parents\Dependencies\AbstractInternalApi;
use Symfony\Component\Uid\Uuid;

class InternalApi extends AbstractInternalApi implements InternalApiInterface
{
    public function isIncomingPaymentAllowed(Uuid $accountId): bool
    {
        // TODO: call validator
        return true;
    }

    public function isOutgoingPaymentAllowed(Uuid $accountId): bool
    {
        // TODO: call validator
        return true;
    }
}