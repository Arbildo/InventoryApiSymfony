<?php

namespace App\Repository;

use App\Entity\TblCliente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblCliente|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblCliente|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblCliente[]    findAll()
 * @method TblCliente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblClienteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblCliente::class);
    }

    // /**
    //  * @return TblCliente[] Returns an array of TblCliente objects
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
    public function findOneBySomeField($value): ?TblCliente
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
