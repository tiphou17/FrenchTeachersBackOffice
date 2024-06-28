<?php

namespace App\Repository;

use App\Entity\Teacher;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Teacher>
 */
class TeacherRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Teacher::class);
    }

    public function getTeachers(): array
    {
        return $this->createQueryBuilder('teacher')
            ->select('teacher.id', 'teacher.name', 'teacher.description', 'teacher.hook_sentence', 'teacher.email', 'teacher.phone_number', 'teacher.video_path', )
            ->getQuery()
            ->getResult()
        ;
    }

    public function getTeacher($teacherId): array
    {
        return $this->createQueryBuilder('teacher')
            ->select('teacher.id', 'teacher.name', 'teacher.description', 'teacher.hook_sentence', 'teacher.email', 'teacher.phone_number', 'teacher.video_path', )
            ->where('teacher.id = :id')
            ->setParameter('id', $teacherId)
            ->getQuery()
            ->getResult()
        ;
    }
    //    /**
    //     * @return Teacher[] Returns an array of Teacher objects
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

    //    public function findOneBySomeField($value): ?Teacher
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
