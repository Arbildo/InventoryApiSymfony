<?php

namespace App\Repository;

use App\Entity\TblGuiaSalida;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblGuiaSalida|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblGuiaSalida|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblGuiaSalida[]    findAll()
 * @method TblGuiaSalida[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblGuiaSalidaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblGuiaSalida::class);
    }

    // /**
    //  * @return TblGuiaSalida[] Returns an array of TblGuiaSalida objects
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
    public function findOneBySomeField($value): ?TblGuiaSalida
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
