<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Introduction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class IntroductionFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $introductionText = 'Hallo, welkom! Kijk gerust even wat je nodig hebt hier 👨‍💻';

        $foundIntroductionText = $manager->getRepository(Introduction::class)->findOneBy([
            'text' => $introductionText,
        ]);
        if ($foundIntroductionText) {
            return;
        }

        $introduction = new Introduction(null, $introductionText);
        $manager->persist($introduction);
        $manager->flush();
    }
}
