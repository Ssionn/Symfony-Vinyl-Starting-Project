<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        $songs = [
            ['song' => "Bohemian Rhapsody", 'artist' => "Queen", 'genre' => "Rock", 'rating' => 99],
            ['song' => "Imagine", 'artist' => "John Lennon", 'genre' => "Pop", 'rating' => 75],
            ['song' => "Hotel California", 'artist' => "Eagles", 'genre' => "Rock", 'rating' => 82],
            ['song' => "Like a Rolling Stone", 'artist' => "Bob Dylan", 'genre' => "Rock", 'rating' => 90],
            ['song' => "Hey Jude", 'artist' => "The Beatles", 'genre' => "Rock", 'rating' => 87],
            ['song' => "Stairway to Heaven", 'artist' => "Led Zeppelin", 'genre' => "Rock", 'rating' => 95],
            ['song' => "Billie Jean", 'artist' => "Michael Jackson", 'genre' => "Pop", 'rating' => 80],
            ['song' => "Smells Like Teen Spirit", 'artist' => "Nirvana", 'genre' => "Grunge", 'rating' => 88],
            ['song' => "Purple Haze", 'artist' => "Jimi Hendrix", 'genre' => "Rock", 'rating' => 91],
            ['song' => "Rolling in the Deep", 'artist' => "Adele", 'genre' => "Pop", 'rating' => 83],
            ['song' => "Wonderwall", 'artist' => "Oasis", 'genre' => "Rock", 'rating' => 78],
            ['song' => "Shape of You", 'artist' => "Ed Sheeran", 'genre' => "Pop", 'rating' => 72],
            ['song' => "Bohemian Rhapsody", 'artist' => "Queen", 'genre' => "Rock", 'rating' => 70],
            ['song' => "Don't Stop Believin'", 'artist' => "Journey", 'genre' => "Rock", 'rating' => 89],
            ['song' => "Thriller", 'artist' => "Michael Jackson", 'genre' => "Pop", 'rating' => 85],
            ['song' => "Hallelujah", 'artist' => "Leonard Cohen", 'genre' => "Folk", 'rating' => 94],
            ['song' => "Sweet Child o' Mine", 'artist' => "Guns N' Roses", 'genre' => "Rock", 'rating' => 93],
            ['song' => "Imagine", 'artist' => "John Lennon", 'genre' => "Pop", 'rating' => 76],
            ['song' => "Let It Be", 'artist' => "The Beatles", 'genre' => "Rock", 'rating' => 86],
            ['song' => "Yesterday", 'artist' => "The Beatles", 'genre' => "Rock", 'rating' => 84],
        ];

        usort($songs, function ($a, $b) {
            return $b['rating'] <=> $a['rating'];
        });

        $top5Songs = array_slice($songs, 0, 5);

        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'Vinyl Record Store',
            'songs' => $songs,
            'top5Songs' => $top5Songs,
        ]);
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {
        $songs = [
            ['song' => "Bohemian Rhapsody", 'artist' => "Queen", 'genre' => "Rock", 'rating' => 99],
            ['song' => "Imagine", 'artist' => "John Lennon", 'genre' => "Pop", 'rating' => 75],
            ['song' => "Hotel California", 'artist' => "Eagles", 'genre' => "Rock", 'rating' => 82],
            ['song' => "Like a Rolling Stone", 'artist' => "Bob Dylan", 'genre' => "Rock", 'rating' => 90],
            ['song' => "Hey Jude", 'artist' => "The Beatles", 'genre' => "Rock", 'rating' => 87],
            ['song' => "Stairway to Heaven", 'artist' => "Led Zeppelin", 'genre' => "Rock", 'rating' => 95],
            ['song' => "Billie Jean", 'artist' => "Michael Jackson", 'genre' => "Pop", 'rating' => 80],
            ['song' => "Smells Like Teen Spirit", 'artist' => "Nirvana", 'genre' => "Grunge", 'rating' => 88],
            ['song' => "Purple Haze", 'artist' => "Jimi Hendrix", 'genre' => "Rock", 'rating' => 91],
            ['song' => "Rolling in the Deep", 'artist' => "Adele", 'genre' => "Pop", 'rating' => 83],
            ['song' => "Wonderwall", 'artist' => "Oasis", 'genre' => "Rock", 'rating' => 78],
            ['song' => "Shape of You", 'artist' => "Ed Sheeran", 'genre' => "Pop", 'rating' => 72],
            ['song' => "Bohemian Rhapsody", 'artist' => "Queen", 'genre' => "Rock", 'rating' => 70],
            ['song' => "Don't Stop Believin'", 'artist' => "Journey", 'genre' => "Rock", 'rating' => 89],
            ['song' => "Thriller", 'artist' => "Michael Jackson", 'genre' => "Pop", 'rating' => 85],
            ['song' => "Hallelujah", 'artist' => "Leonard Cohen", 'genre' => "Folk", 'rating' => 94],
            ['song' => "Sweet Child o' Mine", 'artist' => "Guns N' Roses", 'genre' => "Rock", 'rating' => 93],
            ['song' => "Imagine", 'artist' => "John Lennon", 'genre' => "Pop", 'rating' => 76],
            ['song' => "Let It Be", 'artist' => "The Beatles", 'genre' => "Rock", 'rating' => 86],
            ['song' => "Yesterday", 'artist' => "The Beatles", 'genre' => "Rock", 'rating' => 84],
        ];


        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;
        $title = $genre ? "Browse: $genre" : 'Browse all genres';

        if ($genre) {
            $songs = array_filter($songs, fn($song) => strcasecmp($song['genre'], $genre) === 0);
        }

        if (empty($songs)) {
            throw $this->createNotFoundException("No songs found for genre '$genre'");
        }

        return $this->render('vinyl/browse.html.twig', [
            'title' => $title,
            'genre' => $genre,
            'songs' => $songs,
        ]);
    }
}