<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230906111035 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $songs = [
            ['song' => "Bohemian Rhapsody", 'artist' => "Queen", 'genre' => "Rock", 'rating' => 99, 'link' => 'https://www.youtube.com/embed/fJ9rUzIMcZQ?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
            ['song' => "Imagine", 'artist' => "John Lennon", 'genre' => "Pop", 'rating' => 75, 'link' => 'https://www.youtube.com/embed/ugrAo8wEPiI?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
            ['song' => "Hotel California", 'artist' => "Eagles", 'genre' => "Rock", 'rating' => 82, 'link' => 'https://www.youtube.com/embed/09839DpTctU?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
            ['song' => "Like a Rolling Stone", 'artist' => "Bob Dylan", 'genre' => "Rock", 'rating' => 90, 'link' => 'https://www.youtube.com/embed/IwOfCgkyEj0?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
            ['song' => "Hey Jude", 'artist' => "The Beatles", 'genre' => "Rock", 'rating' => 87, 'link' => 'https://www.youtube.com/embed/A_MjCqQoLLA?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
            ['song' => "Stairway to Heaven", 'artist' => "Led Zeppelin", 'genre' => "Rock", 'rating' => 95, 'link' => 'https://www.youtube.com/embed/QkF3oxziUI4?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
            ['song' => "Billie Jean", 'artist' => "Michael Jackson", 'genre' => "Pop", 'rating' => 80, 'link' => 'https://www.youtube.com/embed/Zi_XLOBDo_Y?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
            ['song' => "Smells Like Teen Spirit", 'artist' => "Nirvana", 'genre' => "Grunge", 'rating' => 88, 'link' => 'https://www.youtube.com/embed/hTWKbfoikeg?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
            ['song' => "Purple Haze", 'artist' => "Jimi Hendrix", 'genre' => "Rock", 'rating' => 91, 'link' => 'https://www.youtube.com/embed/WGoDaYjdfSg?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
            ['song' => "Rolling in the Deep", 'artist' => "Adele", 'genre' => "Pop", 'rating' => 83, 'link' => 'https://www.youtube.com/embed/rYEDA3JcQqw?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
            ['song' => "Wonderwall", 'artist' => "Oasis", 'genre' => "Rock", 'rating' => 78, 'link' => 'https://www.youtube.com/embed/bx1Bh8ZvH84?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
            ['song' => "Shape of You", 'artist' => "Ed Sheeran", 'genre' => "Pop", 'rating' => 72, 'link' => 'https://www.youtube.com/embed/JGwWNGJdvx8?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
            ['song' => "Don’t Stop Believin’", 'artist' => "Journey", 'genre' => "Rock", 'rating' => 89, 'link' => 'https://www.youtube.com/embed/1k8craCGpgs?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
            ['song' => "Thriller", 'artist' => "Michael Jackson", 'genre' => "Pop", 'rating' => 85, 'link' => 'https://www.youtube.com/embed/sOnqjkJTMaA?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
            ['song' => "Hallelujah", 'artist' => "Leonard Cohen", 'genre' => "Folk", 'rating' => 94, 'link' => 'https://www.youtube.com/embed/YrLk4vdY28Q?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
            ['song' => "Sweet Child o’ mine", 'artist' => "Guns N' Roses", 'genre' => "Rock", 'rating' => 93, 'link' => 'https://www.youtube.com/embed/1w7OgIMMRc4?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
            ['song' => "Let It be", 'artist' => "The Beatles", 'genre' => "Rock", 'rating' => 86, 'link' => 'https://www.youtube.com/embed/QDYfEBY9NM4?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
            ['song' => "Yesterday", 'artist' => "The Beatles", 'genre' => "Rock", 'rating' => 84, 'link' => 'https://www.youtube.com/embed/NrgmdOz227I?list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas'],
        ];



        foreach ($songs as $song) {
            $songName = $song['song'];
            $link = $song['link'];

            $this->addSql(
                'UPDATE vinyl SET link = :link WHERE song = :song',
                ['link' => $link, 'song' => $songName]
            );
        }
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql("UPDATE vinyl SET link = ''");
    }
}
