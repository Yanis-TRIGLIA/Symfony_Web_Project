<?php

namespace App\Repository;

use App\Entity\AlbumBand;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AlbumBand>
 *
 * @method AlbumBand|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlbumBand|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlbumBand[]    findAll()
 * @method AlbumBand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlbumBandRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlbumBand::class);
    }

//    /**
//     * @return AlbumBand[] Returns an array of AlbumBand objects
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

//    public function findOneBySomeField($value): ?AlbumBand
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
