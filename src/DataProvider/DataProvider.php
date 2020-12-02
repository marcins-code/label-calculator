<?php


namespace App\DataProvider;


use App\Entity\Rollers;
use App\Entity\SystemSettings;
use Doctrine\ORM\EntityManagerInterface;


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
       $systemSetting =   array_filter($this->getAllSystemSettings(),function ($v) use ($shortName) {
            return $v->getShortName() == $shortName;
        });

       return array_shift($systemSetting)->getValue();
    }


}