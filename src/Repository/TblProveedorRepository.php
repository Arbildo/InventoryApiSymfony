<?php

namespace App\Repository;

use App\Entity\TblProveedor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblProveedor|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblProveedor|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblProveedor[]    findAll()
 * @method TblProveedor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblProveedorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblProveedor::class);
    }

    // /**
    //  * @return TblProveedor[] Returns an array of TblProveedor objects
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
    public function findOneBySomeField($value): ?TblProveedor
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
