<?php

namespace App\Repository;

use App\Entity\Vinyl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Vinyl>
 *
 * @method Vinyl|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vinyl|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vinyl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VinylRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vinyl::class);
    }

    public function findAll(): array
    {
        return $this
            ->createQueryBuilder('v')
            ->orderBy('v.genre', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
    public function findByGenre(string $genre): array
    {
        return $this
            ->createQueryBuilder('v')
            ->andWhere('v.genre like :genre')
            ->setParameter('genre', $genre)
            ->getQuery()
            ->getResult()
        ;
    }

    public function distinctGenre(): array
    {
        return $this
            ->createQueryBuilder('v')
            ->select('DISTINCT v.genre')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findAmount(int $amount): array
    {
        return $this
            ->createQueryBuilder('v')
            ->orderBy('v.rating', 'DESC')
            ->setMaxResults($amount)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findByArtist(string $artist): array
    {
        return $this
            ->createQueryBuilder('v')
            ->andWhere('v.artist like :artist')
            ->setParameter('artist', $artist)
            ->getQuery()
            ->getResult()
            ;
    }




//    /**
//     * @return Vinyl[] Returns an array of Vinyl objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Vinyl
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
