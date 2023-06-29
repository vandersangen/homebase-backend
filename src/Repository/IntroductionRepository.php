<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Introduction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Introduction>
 *
 * @method Introduction|null find($id, $lockMode = null, $lockVersion = null)
 * @method Introduction|null findOneBy(array $criteria, array $orderBy = null)
 * @method Introduction[]    findAll()
 * @method Introduction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IntroductionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Introduction::class);
    }
}
