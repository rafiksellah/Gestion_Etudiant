<?php

namespace App\Repository;

use App\Entity\StuedntResidance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StuedntResidance>
 *
 * @method StuedntResidance|null find($id, $lockMode = null, $lockVersion = null)
 * @method StuedntResidance|null findOneBy(array $criteria, array $orderBy = null)
 * @method StuedntResidance[]    findAll()
 * @method StuedntResidance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StuedntResidanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StuedntResidance::class);
    }

    public function add(StuedntResidance $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(StuedntResidance $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return StuedntResidance[] Returns an array of StuedntResidance objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?StuedntResidance
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
