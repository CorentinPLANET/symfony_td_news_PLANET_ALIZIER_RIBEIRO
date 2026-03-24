<?php

namespace App\Repository;

use App\Entity\Schedule;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Schedule>
 */
class ScheduleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Schedule::class);
    }

    /**
     * @return string[][]
     */
    public function findAllByPeriod(DateTime $start, DateTime $end): array
    {

        $a = $start->format("Y-m-d");
        $b = $end->format("Y-m-d");

        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT schedule.cours,schedule.professeur,schedule.salle,schedule.specialite,schedule.dates FROM schedule
                WHERE dates between :start and :end
                ORDER BY dates ASC';

        $resultSet = $conn->executeQuery($sql, [
            'start' => $a,
            'end' => $b
        ]);

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

    //    /**
    //     * @return Schedule[] Returns an array of Schedule objects
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

    //    public function findOneBySomeField($value): ?Schedule
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
