<?php declare(strict_types=1);


namespace App\Entity;


use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Validator\WidthInput;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\LengthInput;

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
 *     collectionOperations={"post" = {"status"=200}},
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
     * @Groups({"stats:write", "stats:read"})
     * @Assert\NotNull(message="Pole nie może być puste")
     * @Assert\NotBlank(message="Pole nie może być puste33")
     * @LengthInput()
     */
    private int $length;

    /**
     * @Groups({"stats:write", "stats:read"})
     * @Assert\NotNull(message="Pole nie może być puste")
     * @Assert\NotBlank(message="Pole nie może być puste")
     * @WidthInput()
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
    public int $qtyOfLabelsOnFormatOnWidth;

    /**
     * @Groups({"stats:read"})
     */
    public int $qtyOfLabelsOnFormatOnLength;

    /**
     * @Groups({"stats:read"})
     */
    public float $qtyOfLabelsOnFormatOnLengthPunch;


    /**
     * @Groups({"stats:read"})
     */
    public int $totalNumberOfLabels;

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


    //TODO to hermetize all properties
}