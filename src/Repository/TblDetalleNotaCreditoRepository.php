<?php

namespace App\Repository;

use App\Entity\TblDetalleNotaCredito;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblDetalleNotaCredito|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblDetalleNotaCredito|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblDetalleNotaCredito[]    findAll()
 * @method TblDetalleNotaCredito[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblDetalleNotaCreditoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblDetalleNotaCredito::class);
    }

    // /**
    //  * @return TblDetalleNotaCredito[] Returns an array of TblDetalleNotaCredito objects
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
    public function findOneBySomeField($value): ?TblDetalleNotaCredito
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
