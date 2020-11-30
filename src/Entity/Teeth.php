<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TeethRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TeethRepository::class)
 */
class Teeth
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $teeth;


    private float $uFActor = 0;

    private float $calculatedGap = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeeth(): ?int
    {
        return $this->teeth;
    }

    public function setTeeth(int $teeth): self
    {
        $this->teeth = $teeth;

        return $this;
    }


    public function getUFActor(): float
    {
        return $this->uFActor;
    }

    public function setUFActor(float $uFActor): void
    {
        $this->uFActor = $uFActor;
    }

    public function getCalculatedGap(): float
    {
        return $this->calculatedGap;
    }

    public function setCalculatedGap(float $calculatedGap): void
    {
        $this->calculatedGap = $calculatedGap;
    }
}
