<?php

namespace App\Repository;

use App\Entity\LoteryRegistration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LoteryRegistration|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoteryRegistration|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoteryRegistration[]    findAll()
 * @method LoteryRegistration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoteryRegistrationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoteryRegistration::class);
    }

    // /**
    //  * @return LoteryRegistration[] Returns an array of LoteryRegistration objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LoteryRegistration
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
