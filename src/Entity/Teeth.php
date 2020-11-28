<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ToothsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ToothsRepository::class)
 */
class Teeth
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="integer")
     */
    private int $teethNumber;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeethNumber(): ?int
    {
        return $this->teethNumber;
    }

    public function setTeethNumber(int $teethNumber): self
    {
        $this->teethNumber = $teethNumber;

        return $this;
    }
}
