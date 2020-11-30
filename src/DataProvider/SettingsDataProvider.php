<?php


namespace App\DataProvider;


use App\Entity\Teeth;
use Doctrine\ORM\EntityManagerInterface;

class SettingsDataProvider
{


    private EntityManagerInterface $entity;

    public function __construct(EntityManagerInterface $entity)
    {
        $this->entity = $entity;
    }

    public function getAllRollers()
    {
        return $this->entity->getRepository(Teeth::class)->findAll();
    }


}