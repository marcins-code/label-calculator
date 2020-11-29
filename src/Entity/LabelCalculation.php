<?php


namespace App\Entity;


use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\DataProvider\SettingsDataProvider;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ApiResource(
 *
 *      itemOperations={
 *         "get"={
 *             "method"="GET",
 *             "controller"=NotFoundAction::class,
 *             "read"=false,
 *             "output"=false,
 *         },
 *     },
 *     collectionOperations={"post"},
 *     normalizationContext={"groups"={"read"}},
 *     denormalizationContext={"groups"={"write"}},
 * )
 */
class LabelCalculation
{

    /**
     * @ApiProperty(identifier=true)
     * @Groups({"write"})
     */
    public int $length;

    public int $width;

    public float $next;

    public $teeth;


    public function __construct(SettingsDataProvider $settingsData)
    {
        $this->settingsData = $settingsData;
    }

    public function getTeeth()
    {
        return 40;
    }


}