<?php

namespace App\Repository;

use App\Entity\TblProductoDetalleEstado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblProductoDetalleEstado|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblProductoDetalleEstado|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblProductoDetalleEstado[]    findAll()
 * @method TblProductoDetalleEstado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblProductoDetalleEstadoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblProductoDetalleEstado::class);
    }

    // /**
    //  * @return TblProductoDetalleEstado[] Returns an array of TblProductoDetalleEstado objects
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
    public function findOneBySomeField($value): ?TblProductoDetalleEstado
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
