<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Actions\Interfaces;

use Symfony\Component\Uid\Uuid;

interface GetUserWalletsActionInterface
{
    public function run(Uuid $id): array;
}