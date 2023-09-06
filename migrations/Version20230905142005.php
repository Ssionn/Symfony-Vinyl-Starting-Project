<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230905142005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
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

        foreach ($songs as $song) {
            $this->addSql('INSERT INTO vinyl (artist, song, genre, rating) VALUES (:artist, :song, :genre, :rating)', $song);
        }

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DELETE FROM vinyl');
    }
}
