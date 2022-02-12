<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Models;

use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\AccountInterface;
use App\Ship\Parents\Models\AbstractModel;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity]
#[ORM\Table(name: 'accounting_section_transaction_container_account')]
class Account extends AbstractModel implements AccountInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    #[ORM\Column(type: 'uuid', unique: true)]
    private Uuid $id;

    public function __construct(?Uuid $id = null)
    {
        $this->id = $id ?: Uuid::v4();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }
}