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

    /**
     * @Groups({"stats:read"})
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @Groups({"stats:read"})
     */
    public function getTeethNo(): ?int
    {
        return $this->teethNo;
    }

    public function setTeethNo(int $teethNo): self
    {
        $this->teethNo = $teethNo;

        return $this;
    }


    /**
     * @Groups({"stats:read"})
     */
    public function getUFactor(): ?int
    {
        return $this->uFactor;
    }

    public function setUFactor(int $uFactor): void
    {
        $this->uFactor = $uFactor;
    }

    /**
     * @Groups({"stats:read"})
     */
      public function getLengthGap(): ?float
    {
        return $this->lengthGap;
    }

     public function setLengthGap(float $lengthGap): void
    {
        $this->lengthGap = $lengthGap;
    }


}
