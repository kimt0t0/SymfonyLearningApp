<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class TrackApiController extends AbstractController
{
    // #[Route('/track/api', name: 'app_track_api')]
    // public function index(): Response
    // {
    //     return $this->render('track_api/index.html.twig', [
    //         'controller_name' => 'TrackApiController',
    //     ]);
    // }

    #[Route('/tracks/{id<\d+>}', methods: ['GET', 'PATCH', 'DELETE'])]
    public function getSong(int $id, LoggerInterface $logger): Response
    {
        // temporary fake data
        $track = [
            'id' => $id,
            'name' => 'Waterfalls',
            'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3'
        ];

        $logger->info('Returning API response for track {track}', [
            'track' => $id
        ]);

        return new JsonResponse($track);
    }
}
