<?php declare(strict_types=1);


namespace App\Entity;


use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *      itemOperations={
 *         "get"={
 *             "method"="GET",
 *             "controller"=NotFoundAction::class,
 *             "read"=false,
 *             "output"=false,
 *         },
 *     },
 *     collectionOperations={"post"},
 *
 *     normalizationContext={"groups"={"stats:read"}},
 *     denormalizationContext={"groups"={"stats:write"}},
 *     shortName="calculation"
 * )
 */
class LabelCalculation
{
    /**
     * @ApiProperty(identifier=true)
     * @Groups({"stats:read"})
     */
    public string $identifier;


    /**
     * @Groups({"stats:write"})
     * @Assert\NotNull(message="Pole nie może być puste")
     * @Assert\NotBlank(message="Pole nie może być puste33")
     * @Assert\Range(min="15", max="609", maxMessage="Wartość nie może być większa niż 609mm", minMessage="Wartość nie może być mniejsza niż 15mm ")
     */
    private int $length;

    /**
     * @Groups({"stats:write"})
     */
    private int $width;

    /**
     * @Groups({"stats:read"})
     */
    public array $rollers;

    /**
     * @Groups({"stats:read"})
     */
    public object $chosenRoller;

    /**
     * @Groups({"stats:read"})
     */
    public function getChosenRollerID(): int
    {
        return $chosenRollerID = $this->chosenRoller->getID();
    }


    /**
     * @Groups({"stats:read"})
     */
    public function getChosenRollerTeethNo(): int
    {
        return $chosenRollerTeethNo = $this->chosenRoller->getTeethNo();
    }

    /**
     * @Groups({"stats:read"})
     */
    public function getChosenRollerUFactor()
    {
        return $chosenRollerUFactor = $this->chosenRoller->getUFactor();
    }

    /**
     * @Groups({"stats:read"})
     */
    public function getChosenRollerCalculatedGap()
    {
        return $chosenRollerCalculatedGap = $this->chosenRoller->getLengthGap();

    }

    public function getLength(): int
    {
        return $this->length;
    }


    public function setLength(int $length): void
    {
        $this->length = $length;
    }


    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

}