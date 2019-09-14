<?php

namespace App\Repository;

use App\Entity\TblLote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblLote|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblLote|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblLote[]    findAll()
 * @method TblLote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblLoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblLote::class);
    }

    // /**
    //  * @return TblLote[] Returns an array of TblLote objects
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
    public function findOneBySomeField($value): ?TblLote
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
