<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Actions;

use App\Containers\SecuritySection\SecurityUserContainer\Actions\Interfaces\ValidatePasswordActionInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Values\CredentialsValue;
use App\Ship\Parents\Actions\AbstractAction;

class ValidatePasswordAction extends AbstractAction implements ValidatePasswordActionInterface
{
    public function run(CredentialsValue $credentials): bool
    {
        return true; // TODO: refactor it
    }
}