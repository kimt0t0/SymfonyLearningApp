<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class HomeController extends AbstractController
{
    #[Route('/')]
    public function landingpage()
    {
        $title = 'Ma Musique';
        return $this->render('base.html.twig', array(
            'title' => $title
        ));
    }
}
