<?php

namespace App\Repository;

use App\Entity\TblDetalleOrdenCompra;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblDetalleOrdenCompra|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblDetalleOrdenCompra|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblDetalleOrdenCompra[]    findAll()
 * @method TblDetalleOrdenCompra[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblDetalleOrdenCompraRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblDetalleOrdenCompra::class);
    }

    // /**
    //  * @return TblDetalleOrdenCompra[] Returns an array of TblDetalleOrdenCompra objects
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
    public function findOneBySomeField($value): ?TblDetalleOrdenCompra
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
