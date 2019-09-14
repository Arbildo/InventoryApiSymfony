<?php

namespace App\Repository;

use App\Entity\TblTipoProducto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblTipoProducto|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblTipoProducto|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblTipoProducto[]    findAll()
 * @method TblTipoProducto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblTipoProductoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblTipoProducto::class);
    }

    // /**
    //  * @return TblTipoProducto[] Returns an array of TblTipoProducto objects
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
    public function findOneBySomeField($value): ?TblTipoProducto
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
