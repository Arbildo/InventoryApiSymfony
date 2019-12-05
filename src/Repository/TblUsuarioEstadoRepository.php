<?php

namespace App\Repository;

use App\Entity\TblUsuarioEstado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblUsuarioEstado|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblUsuarioEstado|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblUsuarioEstado[]    findAll()
 * @method TblUsuarioEstado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblUsuarioEstadoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblUsuarioEstado::class);
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
