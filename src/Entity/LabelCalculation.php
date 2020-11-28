<?php


namespace App\Entity;


use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;

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
 *     collectionOperations={"post"}
 * )
 */
class LabelCalculation
{

    /**
     * @ApiProperty(identifier=true)
     */
    public int $length;

    public int $width;

    public float $next;


    public function getNext(): float
    {
        return $this->next = $this->length * 0.22;
    }

}