<?php

namespace App\Repository;

use App\Entity\UsersList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UsersList>
 *
 * @method UsersList|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersList|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersList[]    findAll()
 * @method UsersList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersList::class);
    }

//    /**
//     * @return UsersList[] Returns an array of UsersList objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UsersList
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
