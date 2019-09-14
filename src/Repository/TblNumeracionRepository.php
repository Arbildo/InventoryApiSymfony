<?php

namespace App\Repository;

use App\Entity\TblNumeracion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblNumeracion|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblNumeracion|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblNumeracion[]    findAll()
 * @method TblNumeracion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblNumeracionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblNumeracion::class);
    }

    // /**
    //  * @return TblNumeracion[] Returns an array of TblNumeracion objects
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
    public function findOneBySomeField($value): ?TblNumeracion
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
