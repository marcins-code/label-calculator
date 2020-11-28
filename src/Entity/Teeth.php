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
}
