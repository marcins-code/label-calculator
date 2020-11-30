<?php


namespace App\DataProvider;


use App\Entity\Rollers;
use App\Entity\SystemSettings;
use App\Tests\DataProvider\RollersDataProviderTest;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;

class DataProvider
{


    private EntityManagerInterface $entity;

    public function __construct(EntityManagerInterface $entity)
    {
        $this->entity = $entity;
    }


    public function getAllRollers():array
    {
        return $this->entity->getRepository(Rollers::class)->findAll();
    }


    public function getAllSystemSettings(): array
    {
        return $this->entity->getRepository(SystemSettings::class)->findAll();
    }


    public function getSettingByShortName(string $shortName)
    {

    }


}