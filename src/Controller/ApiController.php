<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api/socials', name: 'app_api_socials')]
    public function index(): JsonResponse
    {
        return $this->json([
            [
                'name' => 'LinkedIn',
                'href' => 'https://www.linkedin.com/in/lars-van-der-sangen-28114086/',
            ],
            [
                'name' => 'GitHub',
                'href' => 'https://github.com/vandersangen',
            ],
            [
                'name' => 'Email',
                'href' => 'mailto:lars@vandersangen.dev',
            ],
            [
                'name' => 'WhatsApp',
                'href' => 'https://wa.me/31611858342',
                'title' => 'Dummy title',
            ]
        ]);
    }
}
