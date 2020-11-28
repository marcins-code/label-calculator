<?php

namespace App\Repository;

use App\Entity\Tooths;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tooths|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tooths|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tooths[]    findAll()
 * @method Tooths[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ToothsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tooths::class);
    }

    // /**
    //  * @return Tooths[] Returns an array of Tooths objects
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
    public function findOneBySomeField($value): ?Tooths
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
