<?php

namespace App\Repository;

use App\Entity\TblVenta;
use DateTime;
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
    public function findByMonthYear($year, $month)
    {
        $fromTime = new DateTime($year . '-' . $month . '-01');
        $toTime = new DateTime($fromTime->format('Y-m-d'). ' first day of next month');
        $qb = $this->createQueryBuilder('p')
            ->where('p.fechaPedido >= :fromTime')
            ->andWhere('p.fechaPedido < :toTime')
            ->setParameter('fromTime', $fromTime)
            ->setParameter('toTime', $toTime);
        return $qb->getQuery()->execute();
    }

    public function findDates()
    {
        $qb = $this->createQueryBuilder('p')
            ->select('p.fechaPago');
        return $qb->getQuery()->execute();
    }

    public function findByMonthYearUnixTime($unixTime)
    {
        $fromTime = new DateTime($unixTime);
        $toTime = new DateTime($fromTime->format('Y-m-d H:i:s'). ' first day of next month');

        $qb = $this->createQueryBuilder('p')
            ->where('p.fechaPedido >= :fromTime')
            ->andWhere('p.fechaPedido < :toTime')
            ->setParameter('fromTime', $fromTime)
            ->setParameter('toTime', $toTime);
        return $qb->getQuery()->execute();
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
