<?php

declare(strict_types=1);

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

final class SocialController extends AbstractController
{
    #[Route('/api/socials', name: 'app_api_socials')]
    public function index(): JsonResponse
    {
        return $this->json([
            [
                'name' => 'LinkedIn',
                'href' => 'https://www.linkedin.com/in/lars-van-der-sangen-28114086/',
                'target' => '_blank',
            ],
            [
                'name' => 'GitHub',
                'href' => 'https://github.com/vandersangen',
                'target' => '_blank',
            ],
            [
                'name' => 'Email',
                'href' => 'mailto:lars@vandersangen.dev',
                'target' => '_blank',
            ],
            [
                'name' => 'WhatsApp',
                'href' => 'https://wa.me/31611858342',
                'target' => '_blank',
            ]
        ]);
    }
}
