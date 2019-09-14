<?php

namespace App\Repository;

use App\Entity\TblNotaCredito;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblNotaCredito|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblNotaCredito|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblNotaCredito[]    findAll()
 * @method TblNotaCredito[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblNotaCreditoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblNotaCredito::class);
    }

    // /**
    //  * @return TblNotaCredito[] Returns an array of TblNotaCredito objects
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
    public function findOneBySomeField($value): ?TblNotaCredito
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
