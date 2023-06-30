<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Social;
use App\Repository\SocialRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

final class SocialFixture extends Fixture
{
    private SocialRepository $socialRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager,
        SocialRepository $socialRepository
    )
    {
        $this->socialRepository = $socialRepository;
        $this->entityManager = $entityManager;
    }

    public function load(ObjectManager $manager): void
    {
        $this->createSocialIfNotExist(
            'LinkedIn',
            'https://www.linkedin.com/in/lars-van-der-sangen-28114086/'
        );

        $this->createSocialIfNotExist(
            'GitHub',
            'https://github.com/vandersangen'
        );

        $this->createSocialIfNotExist(
            'Email',
            'mailto:lars@vandersangen.dev'
        );

        $this->createSocialIfNotExist(
            'WhatsApp',
            'https://wa.me/31611858342'
        );

        $manager->flush();
    }

    public function createSocialIfNotExist(string $name, string $href): void
    {
        $foundSocial = $this->socialRepository->findOneBy(['name' => $name]);
        if ($foundSocial === null) {
            $social = new Social(
                null,
                $name,
                $href
            );
            $this->entityManager->persist($social);
        }
    }
}
