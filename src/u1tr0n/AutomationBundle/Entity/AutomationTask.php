<?php

namespace u1tr0n\AutomationBundle\Entity;

use App\Domain\Filter\Enum\FilterTypeEnum;
use App\Domain\Filter\Repository\FilterRepository;
use App\Infrastructure\Traits\CreatedAtTrait;
use App\Infrastructure\Traits\DeletedAtTrait;
use App\Infrastructure\Traits\UpdatedAtTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\UuidV4;

#[ORM\Table('automation_tasks')]
#[ORM\HasLifecycleCallbacks]
class AutomationTask
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    private UuidV4 $id;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    protected ?\DateTimeInterface $createdAt = null;

    public function __construct(UuidV4 $id = null)
    {
        $this->id = $id ?? new UuidV4();
    }

    public function getId(): UuidV4
    {
        return $this->id;
    }

    #[ORM\PrePersist]
    public function persistCreatedAt(): void
    {
        if (null === $this->getCreatedAt()) {
            $this->setCreatedAt(new \DateTimeImmutable());
        }
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
