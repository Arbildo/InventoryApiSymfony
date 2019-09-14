<?php

namespace App\Repository;

use App\Entity\TblAtendido;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblAtendido|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblAtendido|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblAtendido[]    findAll()
 * @method TblAtendido[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblAtendidoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblAtendido::class);
    }

    // /**
    //  * @return TblAtendido[] Returns an array of TblAtendido objects
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
    public function findOneBySomeField($value): ?TblAtendido
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
