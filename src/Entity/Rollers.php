<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RollersRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"rollers:read"}}
 * )
 * @ORM\Entity(repositoryClass=RollersRepository::class)
 */
class Rollers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"rollers:read"})
     */
    private int $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"rollers:read"})
     */
    private int $teethNo;


    private ?int $uFactor;

    private  ?float $lengthGap;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeethNo(): ?int
    {
        return $this->teethNo;
    }

    public function setTeethNo(int $teethNo): self
    {
        $this->teethNo = $teethNo;

        return $this;
    }


    public function getUFactor(): ?int
    {
        return $this->uFactor;
    }

    public function setUFactor(int $uFactor): void
    {
        $this->uFactor = $uFactor;
    }

      public function getLengthGap(): ?float
    {
        return $this->lengthGap;
    }

    public function setLengthGap(float $lengthGap): void
    {
        $this->lengthGap = $lengthGap;
    }


}
