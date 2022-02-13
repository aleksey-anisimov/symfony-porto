<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Models;

use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\AccountInterface;
use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\TransactionInterface;
use App\Ship\Core\Generators\UuidGenerator;
use App\Ship\Parents\Models\AbstractModel;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'accounting_section_transaction_container_transaction')]
class Transaction extends AbstractModel implements TransactionInterface
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', unique: true)]
    private string $id;

    #[ORM\ManyToOne(targetEntity: AccountInterface::class)]
    #[ORM\JoinColumn(name: 'source_account_id', nullable: false)]
    private AccountInterface $source;

    #[ORM\ManyToOne(targetEntity: AccountInterface::class)]
    #[ORM\JoinColumn(name: 'source_destination_id', nullable: false)]
    private AccountInterface $destination;

    #[ORM\Column(type: 'string')]
    private string $comment = '';

    #[ORM\Column(type: 'integer')]
    private int $value; // TODO: refactor it

    public function __construct(?string $id = null)
    {
        $this->id = UuidGenerator::uuidString($id);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSource(): AccountInterface
    {
        return $this->source;
    }

    public function setSource(AccountInterface $source): TransactionInterface
    {
        $this->source = $source;

        return $this;
    }

    public function getDestination(): AccountInterface
    {
        return $this->destination;
    }

    public function setDestination(AccountInterface $destination): TransactionInterface
    {
        $this->destination = $destination;

        return $this;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): TransactionInterface
    {
        $this->comment = $comment;

        return $this;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): TransactionInterface
    {
        $this->value = $value;

        return $this;
    }
}