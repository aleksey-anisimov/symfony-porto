<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Models;

use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\AccountInterface;
use App\Ship\Core\Generators\UuidGenerator;
use App\Ship\Parents\Models\AbstractModel;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'accounting_section_transaction_container_account')]
class Account extends AbstractModel implements AccountInterface
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', unique: true)]
    private string $id;

    public function __construct(?string $id = null)
    {
        $this->id = UuidGenerator::uuidString($id);
    }

    public function getId(): string
    {
        return $this->id;
    }
}