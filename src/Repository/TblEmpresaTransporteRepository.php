<?php

namespace App\Repository;

use App\Entity\TblEmpresaTransporte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblEmpresaTransporte|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblEmpresaTransporte|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblEmpresaTransporte[]    findAll()
 * @method TblEmpresaTransporte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblEmpresaTransporteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblEmpresaTransporte::class);
    }

    // /**
    //  * @return TblEmpresaTransporte[] Returns an array of TblEmpresaTransporte objects
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
    public function findOneBySomeField($value): ?TblEmpresaTransporte
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
