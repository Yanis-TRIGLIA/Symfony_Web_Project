<?php

namespace App\Repository;

use App\Entity\AlbumGender;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AlbumGender>
 *
 * @method AlbumGender|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlbumGender|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlbumGender[]    findAll()
 * @method AlbumGender[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlbumGenderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlbumGender::class);
    }

//    /**
//     * @return AlbumGender[] Returns an array of AlbumGender objects
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

//    public function findOneBySomeField($value): ?AlbumGender
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
