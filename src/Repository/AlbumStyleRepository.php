<?php

namespace App\Repository;

use App\Entity\AlbumStyle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AlbumStyle>
 *
 * @method AlbumStyle|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlbumStyle|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlbumStyle[]    findAll()
 * @method AlbumStyle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlbumStyleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlbumStyle::class);
    }

//    /**
//     * @return AlbumStyle[] Returns an array of AlbumStyle objects
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

//    public function findOneBySomeField($value): ?AlbumStyle
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
