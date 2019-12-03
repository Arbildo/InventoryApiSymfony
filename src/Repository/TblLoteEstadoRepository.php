<?php

namespace App\Repository;

use App\Entity\TblLoteEstado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblLoteEstado|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblLoteEstado|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblLoteEstado[]    findAll()
 * @method TblLoteEstado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblLoteEstadoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblLoteEstado::class);
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
