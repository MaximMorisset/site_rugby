<?php

namespace App\Repository;

use App\Entity\Utilisateurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<Utilisateurs>
 *
 * @implements PasswordUpgraderInterface<Utilisateurs>
 *
 * @method Utilisateurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilisateurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilisateurs[]    findAll()
 * @method Utilisateurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisateursRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilisateurs::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof Utilisateurs) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

//    /**
//     * @return Utilisateurs[] Returns an array of Utilisateurs objects
//     */
/*public function findUsers(?string $roles)
{
    return $this->createQueryBuilder('u')
        ->where('u.roles = :val')
        ->setParameter('val', $roles)
        ->orderBy('u.nom', 'ASC')
        ->getQuery()
        ->getResult()

    ;
}

public function findAllUser(?string $roles)
    {
        if (!$roles) {
            $query = $this->createQueryBuilder('u')
                ->orderBy('u.nom', 'ASC')
            ;
            return $query->getQuery()->getResult();
        }else {
            $query = $this->createQueryBuilder('u')
                ->where('u.roles LIKE :val')
                ->setParameter('val', $roles)
                ->orderBy('u.nom', 'ASC')
            ;
            return $query->getQuery()->getResult();
        }
    }

    public function findUsers(?string $roles)
{
    $query = $this->createQueryBuilder('u')
                    ->orderBy('u.nom', 'ASC');
    if ($roles) {
            $query->andWhere('u.roles LIKE :val')
                        ->setParameter('val', '%'.$roles.'%');
    }
        return $query->getQuery()->getResult();
}*/

public function findUsers(?string $role): array
{
    $entityManager = $this->getEntityManager()->getConnection();
    
    $query ='
        SELECT *
        FROM Utilisateurs 
        WHERE roles::jsonb ?? :role
        ORDER BY nom ASC
    ';

   $resultSet=$entityManager->executeQuery($query, ['role' => $role]);

    return $resultSet->fetchAllAssociative();
}
//    public function findOneBySomeField($value): ?Utilisateurs
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}