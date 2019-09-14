<?php

namespace App\Repository;

use App\Entity\TblDetalleAtendido;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblDetalleAtendido|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblDetalleAtendido|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblDetalleAtendido[]    findAll()
 * @method TblDetalleAtendido[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblDetalleAtendidoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblDetalleAtendido::class);
    }

    // /**
    //  * @return TblDetalleAtendido[] Returns an array of TblDetalleAtendido objects
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
    public function findOneBySomeField($value): ?TblDetalleAtendido
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
