<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

#[Route('/themes')]
class ThemeController extends AbstractController
{
    #[Route('/', name: 'app_themes')]
    public function themespage(Environment $twig)
    {
        $title = 'Thèmes Musicaux';
        $themes = [
            ['title' => 'Détente', 'theme' => 'detente'],
            ['title' => 'Queer', 'theme' => 'queer'],
            ['title' => 'Tous', 'theme' => 'tous']
        ];
        $html = $twig->render('themes/themespage.html.twig', array(
            'title' => $title,
            'themes' => $themes
        ));
        return new Response($html);
    }

    #[Route('/{theme}', name: 'app_theme', methods: ['GET', 'PATCH', 'DELETE'])]
    public function themepage(string $theme = 'tous')
    {
        if ($theme) {
            $title = str_replace('-', ' ', $theme);
            $tracks = [
                ['name' => 'Rouge Colère', 'artist' => 'Sages comme des Sauvages', 'filepath' => 'https://www.youtube.com/watch?v=G8sMws6oNR0'],
                ['name' => 'Gender Binary', 'artist' => ' Ryan Cassata', 'filepath' => 'https://www.youtube.com/watch?v=z0n6smGalBM'],
                ['name' => 'Chaotic Gender Neutral', 'artist' => 'Murder Person for Hire', 'filepath' => 'https://www.youtube.com/watch?v=RZjGe90ILDI'],
                ['name' => 'Mad World', 'artist' => 'Gary Jules', 'filepath' => 'https://www.youtube.com/watch?v=4N3N1MlvVc4']
            ];
            return $this->render(
                'themes/themepage.html.twig',
                [
                    'theme' => $theme,
                    'title' => $title,
                    'tracks' => $tracks
                ]
            );
        } else {
            $title = 'Oups, ce thème ne semble pas exister !';
            $themes = [
                ['title' => 'Détente', 'path' => '/themes/detente'],
                ['title' => 'Queer', 'path' => '/themes/queer'],
                ['title' => 'Tous', 'path' => '/themes/tous']
            ];
            return $this->render('themes/themespage.html.twig', array(
                'title' => $title,
                'themes' => $themes
            ));
        }
    }
}
