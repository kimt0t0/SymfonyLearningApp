<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class HomeController extends AbstractController
{
    #[Route('/', methods: ['GET'], name: 'app_homepage')]
    public function homepage()
    {
        $title = 'Ma Musique';
        return $this->render('base.html.twig', array(
            'title' => $title
        ));
    }
}
