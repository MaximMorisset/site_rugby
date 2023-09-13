<?php

namespace App\Repository;

use App\Entity\EquipeMatch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EquipeMatch>
 *
 * @method EquipeMatch|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipeMatch|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipeMatch[]    findAll()
 * @method EquipeMatch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipeMatchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquipeMatch::class);
    }

//    /**
//     * @return EquipeMatch[] Returns an array of EquipeMatch objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EquipeMatch
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
