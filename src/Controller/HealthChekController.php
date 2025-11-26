<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HealthChekController extends AbstractController
{
    #[Route(path:'/up', name: 'healthchek', methods: ['GET'])]
    public function up(): Response
    {
        return new Response('Application is running!');
    }
}