<?php

namespace App\Repository;

use App\Entity\AdhesionClub;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AdhesionClub>
 *
 * @method AdhesionClub|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdhesionClub|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdhesionClub[]    findAll()
 * @method AdhesionClub[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdhesionClubRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdhesionClub::class);
    }

//    /**
//     * @return AdhesionClub[] Returns an array of AdhesionClub objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AdhesionClub
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
