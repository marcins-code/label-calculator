<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RollersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=RollersRepository::class)
 */
class Rollers
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
    private $teethNo;

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
}
