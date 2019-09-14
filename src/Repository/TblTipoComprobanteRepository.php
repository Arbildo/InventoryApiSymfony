<?php

namespace App\Repository;

use App\Entity\TblTipoComprobante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblTipoComprobante|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblTipoComprobante|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblTipoComprobante[]    findAll()
 * @method TblTipoComprobante[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblTipoComprobanteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblTipoComprobante::class);
    }

    // /**
    //  * @return TblTipoComprobante[] Returns an array of TblTipoComprobante objects
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
    public function findOneBySomeField($value): ?TblTipoComprobante
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
