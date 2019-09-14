<?php

namespace App\Repository;

use App\Entity\TblCargo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblCargo|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblCargo|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblCargo[]    findAll()
 * @method TblCargo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblCargoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblCargo::class);
    }

    // /**
    //  * @return TblCargo[] Returns an array of TblCargo objects
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
    public function findOneBySomeField($value): ?TblCargo
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
