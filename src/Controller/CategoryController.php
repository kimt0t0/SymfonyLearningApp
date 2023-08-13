<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController
{
    #[Route('/')]
    public function landingpage()
    {
        return new Response('This is my test response...');
    }

    #[Route('/themes')]
    public function themespage()
    {
        return new Response('This is a themes list :-)');
    }

    #[Route('/themes/{slug}')]
    public function themepage()
    {
        return new Response('This is an album page !');
    }
}
