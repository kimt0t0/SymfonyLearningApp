<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/')]
    public function landingpage()
    {
        $title = 'Ma Musique';
        return $this->render('base.html.twig');
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
            $tracks = [
                ['song' => 'Rouge Colère', 'artist' => 'Sages comme des Sauvages'],
                ['song' => 'Gender Binary', 'artist' => ' Ryan Cassata'],
                ['song' => 'Chaotic Gender Neutral', 'artist' => 'Murder Person for Hire'],
                ['song' => 'Mad World', 'artist' => 'Gary Jules']
            ];
            return $this->render(
                'themes/themepage.html.twig',
                [
                    'title' => $title,
                    'tracks' => $tracks
                ]
            );
        } else {
            $title = 'Thèmes Musicaux';
            $themes = [
                ['title' => 'Détente', 'path' => '/themes/detente'],
                ['title' => 'Queer', 'path' => '/themes/queer'],
                ['title' => 'Tous', 'path' => '/themes/tous']
            ];
            return $this->render('themes/homepage.html.twig', array(
                'title' => $title,
                'themes' => $themes
            ));
        }
    }
}
