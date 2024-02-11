<?php

namespace App\Repository;

use App\Entity\AlbumCover;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AlbumCover>
 *
 * @method AlbumCover|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlbumCover|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlbumCover[]    findAll()
 * @method AlbumCover[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlbumCoverRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlbumCover::class);
    }

//    /**
//     * @return AlbumCover[] Returns an array of AlbumCover objects
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

//    public function findOneBySomeField($value): ?AlbumCover
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
