<?php

namespace App\Repository;

use App\Entity\Peripheral;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Peripheral|null find($id, $lockMode = null, $lockVersion = null)
 * @method Peripheral|null findOneBy(array $criteria, array $orderBy = null)
 * @method Peripheral[]    findAll()
 * @method Peripheral[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeripheralRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Peripheral::class);
    }

//    /**
//     * @return Peripheral[] Returns an array of Peripheral objects
//     */

    public function findAllPeripheral()
    {
        return $this->createQueryBuilder('p')
            //->andWhere('p.exampleField = :val')
            //->setParameter('val', $value)
            ->orderBy('p.price', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Peripheral
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
