<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api/socials', name: 'app_dummy_api')]
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
                'name' => 'other social',
                'href' => 'https://google.com'
            ]
        ]);
    }
}
