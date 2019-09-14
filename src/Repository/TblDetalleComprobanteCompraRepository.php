<?php

namespace App\Repository;

use App\Entity\TblDetalleComprobanteCompra;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblDetalleComprobanteCompra|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblDetalleComprobanteCompra|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblDetalleComprobanteCompra[]    findAll()
 * @method TblDetalleComprobanteCompra[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblDetalleComprobanteCompraRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblDetalleComprobanteCompra::class);
    }

    // /**
    //  * @return TblDetalleComprobanteCompra[] Returns an array of TblDetalleComprobanteCompra objects
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
    public function findOneBySomeField($value): ?TblDetalleComprobanteCompra
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
