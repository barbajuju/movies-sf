<?php

namespace App\Repository;

use App\Entity\Movie2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Movie2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie2[]    findAll()
 * @method Movie2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Movie2Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Movie2::class);
    }

//    /**
//     * @return Movie2[] Returns an array of Movie2 objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Movie2
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
