<?php

namespace App\Repository;

use App\Entity\TblUnidadMedida;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblUnidadMedida|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblUnidadMedida|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblUnidadMedida[]    findAll()
 * @method TblUnidadMedida[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblUnidadMedidaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblUnidadMedida::class);
    }

    // /**
    //  * @return TblUnidadMedida[] Returns an array of TblUnidadMedida objects
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
    public function findOneBySomeField($value): ?TblUnidadMedida
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
