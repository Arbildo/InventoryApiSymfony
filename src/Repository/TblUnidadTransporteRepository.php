<?php

namespace App\Repository;

use App\Entity\TblUnidadTransporte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblUnidadTransporte|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblUnidadTransporte|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblUnidadTransporte[]    findAll()
 * @method TblUnidadTransporte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblUnidadTransporteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblUnidadTransporte::class);
    }

    // /**
    //  * @return TblUnidadTransporte[] Returns an array of TblUnidadTransporte objects
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
    public function findOneBySomeField($value): ?TblUnidadTransporte
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
