<?php

namespace App\Repository;

use App\Entity\TblPerdida;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblPerdida|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblPerdida|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblPerdida[]    findAll()
 * @method TblPerdida[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblPerdidaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblPerdida::class);
    }

    // /**
    //  * @return TblPerdida[] Returns an array of TblPerdida objects
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
    public function findOneBySomeField($value): ?TblPerdida
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
