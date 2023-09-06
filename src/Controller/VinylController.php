<?php

namespace App\Controller;

use App\Entity\Vinyl;
use App\Repository\VinylRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{

    public function __construct(protected VinylRepository $vinylRepository)
    {

    }

    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        $songs = $this->vinylRepository->findAmount(5);

        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'Vinyl Record Store',
            'songs' => $songs,
        ]);
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {
        $songs = $this->vinylRepository->findAll();

        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;
        $title = $genre ? "Browse: $genre" : 'Browse all genres';

        if ($genre) {
            $songs = $this->vinylRepository->findByGenre($genre);
        }

        $genres = $this->vinylRepository->distinctGenre();

        if (empty($songs)) {
            throw $this->createNotFoundException("No songs found for genre '$genre'");
        }

        return $this->render('vinyl/browse.html.twig', [
            'title' => $title,
            'genre' => $genre,
            'songs' => $songs,
            'genres' => $genres,
        ]);
    }
}