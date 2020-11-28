<?php

namespace App\Repository;

use App\Entity\Teeth;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Teeth|null find($id, $lockMode = null, $lockVersion = null)
 * @method Teeth|null findOneBy(array $criteria, array $orderBy = null)
 * @method Teeth[]    findAll()
 * @method Teeth[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeethRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Teeth::class);
    }

    // /**
    //  * @return Teeth[] Returns an array of Teeth objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Teeth
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
