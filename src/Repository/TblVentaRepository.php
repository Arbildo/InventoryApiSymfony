<?php

namespace App\Repository;

use App\Entity\TblVenta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblVenta|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblVenta|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblVenta[]    findAll()
 * @method TblVenta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblVentaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblVenta::class);
    }


    // /**
    //  * @return TblProducto[] Returns an array of TblProducto objects
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
    public function findOneBySomeField($value): ?TblProducto
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
