<?php

namespace App\Repository;

use App\Entity\TblComprobanteVenta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblComprobanteVenta|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblComprobanteVenta|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblComprobanteVenta[]    findAll()
 * @method TblComprobanteVenta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblComprobanteVentaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblComprobanteVenta::class);
    }

    // /**
    //  * @return TblComprobanteVenta[] Returns an array of TblComprobanteVenta objects
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
    public function findOneBySomeField($value): ?TblComprobanteVenta
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
