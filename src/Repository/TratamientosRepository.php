<?php

namespace App\Repository;

use App\Entity\Tratamientos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tratamientos>
 *
 * @method Tratamientos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tratamientos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tratamientos[]    findAll()
 * @method Tratamientos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TratamientosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tratamientos::class);
    }

    //    /**
    //     * @return Tratamientos[] Returns an array of Tratamientos objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Tratamientos
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
