<?php

namespace App\Controller;

use App\Entity\Image;
use App\Form\ImageType;
use App\Repository\VinylRepository;
use App\Repository\ArtistRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{

    public function __construct(protected VinylRepository $vinylRepository, protected ArtistRepository $ArtistRepository)
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

    #[Route('/browse/artist/{artist}', name: 'app_artist')]
    public function artist(string           $artist,
                           Request          $request,
                           SluggerInterface $slugger,
                           ManagerRegistry  $doctrine): Response
    {
        $image = new Image();
        $form = $this->createForm(ImageType::class, $image);
        $form = $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('imageFilename')->getData();

            if($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '.' . $imageFile->guessExtension();
                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    throw new \Exception("Error uploading image");
                }

                $image->setImageFilename($newFilename);
            }

//            $artist = $this->ArtistRepository->findArtistImage(Artist::class, $artist)->getArtist();
//            $image->setArtist($artist);

            $entityManager = $doctrine->getManager();
            $entityManager->persist($image);
            $entityManager->flush();

            return $this->redirectToRoute('app_artist', ['artist' => $artist]);
        }

        $artists = $this->vinylRepository->findByArtist($artist);

        if (empty($artists)) {
            throw $this->createNotFoundException("No songs found for artist '$artist'");
        }

        return $this->render('vinyl/artist.html.twig', [
            'title' => "Browse: $artist",
            'artist' => $artist,
            'artists' => $artists,
            'form' => $form,
        ]);
    }

}