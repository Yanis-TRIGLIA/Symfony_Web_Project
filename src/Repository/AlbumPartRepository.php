<?php

namespace App\Repository;

use App\Entity\AlbumPart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AlbumPart>
 *
 * @method AlbumPart|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlbumPart|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlbumPart[]    findAll()
 * @method AlbumPart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlbumPartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlbumPart::class);
    }

//    /**
//     * @return AlbumPart[] Returns an array of AlbumPart objects
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

//    public function findOneBySomeField($value): ?AlbumPart
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
