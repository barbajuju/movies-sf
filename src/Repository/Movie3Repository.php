<?php

namespace App\Repository;

use App\Entity\Movie3;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Movie3|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie3|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie3[]    findAll()
 * @method Movie3[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Movie3Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Movie3::class);
    }

//    /**
//     * @return Movie3[] Returns an array of Movie3 objects
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
    public function findOneBySomeField($value): ?Movie3
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
