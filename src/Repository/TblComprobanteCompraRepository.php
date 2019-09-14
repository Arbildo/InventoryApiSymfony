<?php

namespace App\Repository;

use App\Entity\TblComprobanteCompra;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblComprobanteCompra|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblComprobanteCompra|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblComprobanteCompra[]    findAll()
 * @method TblComprobanteCompra[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblComprobanteCompraRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblComprobanteCompra::class);
    }

    // /**
    //  * @return TblComprobanteCompra[] Returns an array of TblComprobanteCompra objects
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
    public function findOneBySomeField($value): ?TblComprobanteCompra
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
