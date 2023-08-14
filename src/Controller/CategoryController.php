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

    // #[Route('/themes')]
    // public function themespage()
    // {
    // }

    #[Route('/themes/{theme}')]
    public function themepage(string $theme = null)
    {
        if ($theme) {
            $title = str_replace('-', ' ', $theme);
            return new Response('Theme: ' . $title);
        }
        return new Response('This is a themes list :-)');
    }
}
