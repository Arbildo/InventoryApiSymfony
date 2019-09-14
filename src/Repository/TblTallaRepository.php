<?php

namespace App\Repository;

use App\Entity\TblTalla;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblTalla|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblTalla|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblTalla[]    findAll()
 * @method TblTalla[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblTallaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblTalla::class);
    }

    // /**
    //  * @return TblTalla[] Returns an array of TblTalla objects
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
    public function findOneBySomeField($value): ?TblTalla
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
