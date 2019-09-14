<?php

namespace App\Repository;

use App\Entity\TblOrdenCompra;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblOrdenCompra|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblOrdenCompra|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblOrdenCompra[]    findAll()
 * @method TblOrdenCompra[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblOrdenCompraRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblOrdenCompra::class);
    }

    // /**
    //  * @return TblOrdenCompra[] Returns an array of TblOrdenCompra objects
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
    public function findOneBySomeField($value): ?TblOrdenCompra
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
