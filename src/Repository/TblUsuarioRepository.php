<?php

namespace App\Repository;

use App\Entity\TblUsuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblUsuario|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblUsuario|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblUsuario[]    findAll()
 * @method TblUsuario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblUsuarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblUsuario::class);
    }

    // /**
    //  * @return TblUsuario[] Returns an array of TblUsuario objects
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
    public function findOneBySomeField($value): ?TblUsuario
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
