<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230906100550 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $songs = [
            ['song' => "Bohemian Rhapsody", 'artist' => "Queen", 'genre' => "Rock", 'rating' => 99, 'link' => 'https://www.youtube.com/watch?v=fJ9rUzIMcZQ&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=1'],
            ['song' => "Imagine", 'artist' => "John Lennon", 'genre' => "Pop", 'rating' => 75, 'link' => 'https://www.youtube.com/watch?v=ugrAo8wEPiI&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=2'],
            ['song' => "Hotel California", 'artist' => "Eagles", 'genre' => "Rock", 'rating' => 82, 'link' => 'https://www.youtube.com/watch?v=09839DpTctU&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=3'],
            ['song' => "Like a Rolling Stone", 'artist' => "Bob Dylan", 'genre' => "Rock", 'rating' => 90, 'link' => 'https://www.youtube.com/watch?v=IwOfCgkyEj0&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=4'],
            ['song' => "Hey Jude", 'artist' => "The Beatles", 'genre' => "Rock", 'rating' => 87, 'link' => 'https://www.youtube.com/watch?v=A_MjCqQoLLA&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=5'],
            ['song' => "Stairway to Heaven", 'artist' => "Led Zeppelin", 'genre' => "Rock", 'rating' => 95, 'link' => 'https://www.youtube.com/watch?v=QkF3oxziUI4&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=6'],
            ['song' => "Billie Jean", 'artist' => "Michael Jackson", 'genre' => "Pop", 'rating' => 80, 'link' => 'https://www.youtube.com/watch?v=Zi_XLOBDo_Y&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=7'],
            ['song' => "Smells Like Teen Spirit", 'artist' => "Nirvana", 'genre' => "Grunge", 'rating' => 88, 'link' => 'https://www.youtube.com/watch?v=hTWKbfoikeg&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=8'],
            ['song' => "Purple Haze", 'artist' => "Jimi Hendrix", 'genre' => "Rock", 'rating' => 91, 'link' => 'https://www.youtube.com/watch?v=WGoDaYjdfSg&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=9'],
            ['song' => "Rolling in the Deep", 'artist' => "Adele", 'genre' => "Pop", 'rating' => 83, 'link' => 'https://www.youtube.com/watch?v=rYEDA3JcQqw&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=10'],
            ['song' => "Wonderwall", 'artist' => "Oasis", 'genre' => "Rock", 'rating' => 78, 'link' => 'https://www.youtube.com/watch?v=bx1Bh8ZvH84&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=11'],
            ['song' => "Shape of You", 'artist' => "Ed Sheeran", 'genre' => "Pop", 'rating' => 72, 'link' => 'https://www.youtube.com/watch?v=JGwWNGJdvx8&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=12'],
            ['song' => "Don’t Stop Believin’", 'artist' => "Journey", 'genre' => "Rock", 'rating' => 89, 'link' => 'https://www.youtube.com/watch?v=1k8craCGpgs&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=13'],
            ['song' => "Thriller", 'artist' => "Michael Jackson", 'genre' => "Pop", 'rating' => 85, 'link' => 'https://www.youtube.com/watch?v=sOnqjkJTMaA&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=14'],
            ['song' => "Hallelujah", 'artist' => "Leonard Cohen", 'genre' => "Folk", 'rating' => 94, 'link' => 'https://www.youtube.com/watch?v=YrLk4vdY28Q&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=15'],
            ['song' => "Sweet Child o’ mine", 'artist' => "Guns N' Roses", 'genre' => "Rock", 'rating' => 93, 'link' => 'https://www.youtube.com/watch?v=1w7OgIMMRc4&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=16'],
            ['song' => "Let It be", 'artist' => "The Beatles", 'genre' => "Rock", 'rating' => 86, 'link' => 'https://www.youtube.com/watch?v=QDYfEBY9NM4&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=17'],
            ['song' => "Yesterday", 'artist' => "The Beatles", 'genre' => "Rock", 'rating' => 84, 'link' => 'https://www.youtube.com/watch?v=NrgmdOz227I&list=PLIqmZJq9pWyipbg1gA-2G1DQYukJRSpas&index=18']
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
