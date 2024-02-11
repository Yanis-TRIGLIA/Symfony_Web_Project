<?php

namespace App\Repository;

use App\Entity\ArtistBand;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ArtistBand>
 *
 * @method ArtistBand|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArtistBand|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArtistBand[]    findAll()
 * @method ArtistBand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtistBandRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArtistBand::class);
    }

//    /**
//     * @return ArtistBand[] Returns an array of ArtistBand objects
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

//    public function findOneBySomeField($value): ?ArtistBand
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
