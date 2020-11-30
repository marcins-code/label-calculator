<?php

namespace App\Repository;

use App\Entity\Rollers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rollers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rollers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rollers[]    findAll()
 * @method Rollers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RollersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rollers::class);
    }

    // /**
    //  * @return Rollers[] Returns an array of Rollers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rollers
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
