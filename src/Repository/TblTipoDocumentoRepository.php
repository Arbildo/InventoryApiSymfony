<?php

namespace App\Repository;

use App\Entity\TblTipoDocumento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TblTipoDocumento|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblTipoDocumento|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblTipoDocumento[]    findAll()
 * @method TblTipoDocumento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblTipoDocumentoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TblTipoDocumento::class);
    }

    // /**
    //  * @return TblTipoDocumento[] Returns an array of TblTipoDocumento objects
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
    public function findOneBySomeField($value): ?TblTipoDocumento
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
