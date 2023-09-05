<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {
        $songs = [
            ['song' => "Bohemian Rhapsody", 'artist' => "Queen"],
            ['song' => "Imagine", 'artist' => "John Lennon"],
            ['song' => "Hotel California", 'artist' => "Eagles"],
            ['song' => "Like a Rolling Stone", 'artist' => "Bob Dylan"],
            ['song' => "Hey Jude", 'artist' => "The Beatles"],
            ['song' => "Stairway to Heaven", 'artist' => "Led Zeppelin"],
            ['song' => "Billie Jean", 'artist' => "Michael Jackson"],
            ['song' => "Smells Like Teen Spirit", 'artist' => "Nirvana"],
            ['song' => "Purple Haze", 'artist' => "Jimi Hendrix"],
            ['song' => "Rolling in the Deep", 'artist' => "Adele"],
            ['song' => "Wonderwall", 'artist' => "Oasis"],
            ['song' => "Shape of You", 'artist' => "Ed Sheeran"],
            ['song' => "Bohemian Rhapsody", 'artist' => "Queen"],
            ['song' => "Don't Stop Believin'", 'artist' => "Journey"],
            ['song' => "Thriller", 'artist' => "Michael Jackson"],
            ['song' => "Hallelujah", 'artist' => "Leonard Cohen"],
            ['song' => "Sweet Child o' Mine", 'artist' => "Guns N' Roses"],
            ['song' => "Imagine", 'artist' => "John Lennon"],
            ['song' => "Let It Be", 'artist' => "The Beatles"],
            ['song' => "Yesterday", 'artist' => "The Beatles"],
        ];


        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'Vinyl Record Store',
            'songs' => $songs,
        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if ($slug) {
            $title = u(str_replace('-', ' ', $slug))->title(true);
        } else {
            $title = 'All Genres';
        }


        return new Response('Genre: ' . $title);
    }
}