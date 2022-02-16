<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Actions;

use App\Containers\AccountingSection\AccountContainer\Actions\Interfaces\CreateOrUpdateOwnerActionInterface;
use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\OwnerInterface;
use App\Containers\AccountingSection\AccountContainer\Models\Owner;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\GetOwnerTaskInterface;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\SaveOwnerTaskInterface;
use App\Containers\AccountingSection\AccountContainer\Values\CreateOwnerValue;
use App\Ship\Parents\Actions\AbstractAction;

class CreateOrUpdateOrUpdateOwnerAction extends AbstractAction implements CreateOrUpdateOwnerActionInterface
{
    public function __construct(
        private GetOwnerTaskInterface $getOwnerTask,
        private SaveOwnerTaskInterface $saveOwnerTask,
    ) {
    }

    public function run(CreateOwnerValue $ownerValue): OwnerInterface
    {
        $owner = $this->getOwnerTask->run($ownerValue->getId()) ?: new Owner($ownerValue->getId());

        $this->saveOwnerTask->run($owner);

        return $owner;
    }
}