<?php

namespace App\Repository;

use App\Entity\Restaurante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Restaurante|null find($id, $lockMode = null, $lockVersion = null)
 * @method Restaurante|null findOneBy(array $criteria, array $orderBy = null)
 * @method Restaurante[]    findAll()
 * @method Restaurante[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RestauranteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Restaurante::class);
    }

    // /**
    //  * @return Restaurante[] Returns an array of Restaurante objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Restaurante
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
