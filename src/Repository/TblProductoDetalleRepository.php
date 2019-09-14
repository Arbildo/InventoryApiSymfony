<?php

namespace App\Repository;

use App\Entity\TblProductoDetalle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblProductoDetalle|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblProductoDetalle|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblProductoDetalle[]    findAll()
 * @method TblProductoDetalle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblProductoDetalleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblProductoDetalle::class);
    }

    // /**
    //  * @return TblProductoDetalle[] Returns an array of TblProductoDetalle objects
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
    public function findOneBySomeField($value): ?TblProductoDetalle
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
