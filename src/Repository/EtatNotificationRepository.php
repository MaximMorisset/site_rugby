<?php

namespace App\Repository;

use App\Entity\EtatNotification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EtatNotification>
 *
 * @method EtatNotification|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtatNotification|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtatNotification[]    findAll()
 * @method EtatNotification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtatNotificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtatNotification::class);
    }

//    /**
//     * @return EtatNotification[] Returns an array of EtatNotification objects
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

//    public function findOneBySomeField($value): ?EtatNotification
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
