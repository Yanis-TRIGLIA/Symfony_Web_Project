<?php

namespace App\Repository;

use App\Entity\AlbumList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AlbumList>
 *
 * @method AlbumList|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlbumList|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlbumList[]    findAll()
 * @method AlbumList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlbumListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlbumList::class);
    }

//    /**
//     * @return AlbumList[] Returns an array of AlbumList objects
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

//    public function findOneBySomeField($value): ?AlbumList
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
