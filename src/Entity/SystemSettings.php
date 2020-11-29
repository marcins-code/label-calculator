<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SystemSettingsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=SystemSettingsRepository::class)
 */
class SystemSettings
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $setting;

    /**
     * @ORM\Column(type="integer")
     */
    private int $value;

    /**
     * @ORM\Column(type="text")
     */
    private string  $description;


    private float $uFActor;

    private float $calculatedGap;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSetting(): ?string
    {
        return $this->setting;
    }

    public function setSetting(string $setting): self
    {
        $this->setting = $setting;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
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
