<?php

namespace App\Repository;

use App\Entity\TblPedido;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblPedido|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblPedido|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblPedido[]    findAll()
 * @method TblPedido[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblPedidoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblPedido::class);
    }

    // /**
    //  * @return TblPedido[] Returns an array of TblPedido objects
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
    public function findOneBySomeField($value): ?TblPedido
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
