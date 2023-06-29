<?php

declare(strict_types=1);

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

final class IntroductionController extends AbstractController
{
    #[Route('/api/introduction', name: 'app_api_introduction')]
    public function introduction(): JsonResponse
    {
        return $this->json('Hallo, welkom! Kijk gerust even wat je nodig hebt hier 👨‍💻');
    }
}
