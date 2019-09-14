<?php

namespace App\Repository;

use App\Entity\TblDetalleComprobanteVenta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblDetalleComprobanteVenta|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblDetalleComprobanteVenta|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblDetalleComprobanteVenta[]    findAll()
 * @method TblDetalleComprobanteVenta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblDetalleComprobanteVentaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblDetalleComprobanteVenta::class);
    }

    // /**
    //  * @return TblDetalleComprobanteVenta[] Returns an array of TblDetalleComprobanteVenta objects
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
    public function findOneBySomeField($value): ?TblDetalleComprobanteVenta
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
