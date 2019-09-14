<?php

namespace App\Repository;

use App\Entity\TblDetallePedido;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblDetallePedido|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblDetallePedido|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblDetallePedido[]    findAll()
 * @method TblDetallePedido[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblDetallePedidoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblDetallePedido::class);
    }

    // /**
    //  * @return TblDetallePedido[] Returns an array of TblDetallePedido objects
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
    public function findOneBySomeField($value): ?TblDetallePedido
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
