<?php
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

use App\Album;
use App\AlbumSong;
use App\Artist;
use App\ArtistStyle;
use App\Song;
use App\Style;
use \DateTime;

function createDB(): array
{
    // $data = [
    return [
        'albums' => [
            'rtl' => new Album(1, 'Ride the lightning', new DateTime("1984/01/01"), 0, 0),
        ],

        'songs' => [
            'ffwf' => new Song(1, 'Fight fire with fire', 285, 0.99, [1]),
            'rtl' => new Song(2, 'Ride the lightning', 397, 0.99, [1]),
            'fwtbt' => new Song(3, 'For whom the bell tolls', 310, 0.99, [1]),
            'ftb' => new Song(4, 'Fade to black', 417, 0.99, [1]),
            'tui' => new Song(5, 'Trapped under ice', 244, 0.99, [1]),
            'esc' => new Song(6, 'Escape', 264, 0.99, [1]),
            'crd' => new Song(7, 'Creeping death', 396, 0.99, [1]),
            'fcok' => new Song(8, 'The call of Ktulu', 533, 0.99, [1]),
            'tri' => new Song(9, 'The ringer', 22338, 0.99, [1]),
        ],

        'album_songs' => [
            'rtl' => new AlbumSong(1, 1, [1, 2, 3, 4, 5, 6, 7, 8, 9]),
        ],

        'artists' => [
            'met' => new Artist(1, 'Metallica', 'American', new DateTime("1981/01/01")),
        ],

        'styles' => [
            'hm' => new Style(1, 'Heavy metal'),
            'tm' => new Style(2, 'Thrash metal'),
            'hr' => new Style(3, 'Hard rock'),
        ],

        'artist_styles' => [
            'met' => new ArtistStyle(1, 1, [1, 2, 3]),
        ],
    ];
}
