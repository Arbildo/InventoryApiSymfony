<?php

namespace App\Repository;

use App\Entity\TblProductoEstado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblProductoEstado|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblProductoEstado|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblProductoEstado[]    findAll()
 * @method TblProductoEstado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblProductoEstadoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblProductoEstado::class);
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
