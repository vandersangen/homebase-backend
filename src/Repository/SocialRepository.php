<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Social;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Social>
 *
 * @method Social|null find($id, $lockMode = null, $lockVersion = null)
 * @method Social|null findOneBy(array $criteria, array $orderBy = null)
 * @method Social[]    findAll()
 * @method Social[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SocialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Social::class);
    }
}
