<?php

namespace App\Repository;

use App\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\AST\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Car>
 *
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findAll()
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

        public function filterCars($min, $max, $priceOrder, $quantityOrder, $marqueId): array
    {
        $queryBuilder = $this->createQueryBuilder('c');

        if ($min){
            $queryBuilder->andWhere('c.km >= :min')
                ->setParameter('min', $min);
        }
        if ($max){
            $queryBuilder->andWhere('c.km <= :max')
                ->setParameter('max', $max);
        }
        if ($priceOrder){
            $queryBuilder->orderBy('c.price', $priceOrder);
        }

        if ($marqueId){
            $queryBuilder->innerJoin('c.brand', 'b', 'WITH', 'b.id = :brand_id')
                ->setParameter('brand_id', $marqueId);
        }

        return $queryBuilder->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return Car[] Returns an array of Car objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Car
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
