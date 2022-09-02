<?php
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Song;
use App\Entity\Style;
use \DateTime;

function createDB(): array
{
    $styles = [
        'hm' => new Style(1, 'Heavy metal'),
        'tm' => new Style(2, 'Thrash metal'),
        'hr' => new Style(3, 'Hard rock'),
    ];

    $artists = [
        'met' => new Artist(1, 'Metallica', 'American', new DateTime("1981/01/01"), ['hm' => $styles['hm'], 'hr' => $styles['hr']]),
        'irm' => new Artist(2, 'Iron Maiden', 'United Kingdom', new DateTime("1975/01/01"), ['hr' => $styles['hr']]),
    ];

    $songs = [
        'ffwf' => new Song(1, 'Fight fire with fire', 285, 0.99, ['met' => $artists['met'],]),
        'rtl' => new Song(2, 'Ride the lightning', 397, 0.99, ['met' => $artists['met'],]),
        'fwtbt' => new Song(3, 'For whom the bell tolls', 310, 0.99, ['met' => $artists['met'],]),
        'ftb' => new Song(4, 'Fade to black', 417, 0.99, ['met' => $artists['met'],]),
        'tui' => new Song(5, 'Trapped under ice', 244, 0.99, ['met' => $artists['met'],]),
        'esc' => new Song(6, 'Escape', 264, 0.99, ['met' => $artists['met'],]),
        'crd' => new Song(7, 'Creeping death', 396, 0.99, ['met' => $artists['met'],]),
        'fcok' => new Song(8, 'The call of Ktulu', 533, 0.99, ['met' => $artists['met'],]),
        'tri' => new Song(9, 'The ringer', 338, 0.99, ['met' => $artists['met'],]),
        'mop' => new Song(10, 'Master Of Puppets', 518, 0.99, ['met' => $artists['met'],]),

        'bqobd' => new Song(11, 'Be Quick Or Be Dead', 201, 0.99, ['irm' => $artists['irm'],]),
        'fhte' => new Song(12, 'From Here To Eternity', 215, 0.99, ['irm' => $artists['irm'],]),
        'atss' => new Song(13, 'Afraid To Shoot Strangers', 412, 0.99, ['irm' => $artists['irm'],]),
        'fitk' => new Song(14, 'Fear Is The Key', 330, 0.99, ['irm' => $artists['irm'],]),
        'cse' => new Song(15, "Childhood's End", 277, 0.99, ['irm' => $artists['irm'],]),
        'wal' => new Song(16, "Wasting Love", 346, 0.99, ['irm' => $artists['irm'],]),
        'tfu' => new Song(17, "The Fugitive", 292, 0.99, ['irm' => $artists['irm'],]),
        'com' => new Song(18, "Chains Of Misery", 213, 0.99, ['irm' => $artists['irm'],]),
        'tap' => new Song(19, "The Apparition", 233, 0.99, ['irm' => $artists['irm'],]),
        'jbmg' => new Song(20, "Judas Be My Guide", 186, 0.99, ['irm' => $artists['irm'],]),
        'wew' => new Song(21, "Weekend Warrior", 337, 0.99, ['irm' => $artists['irm'],]),
        'fotd' => new Song(22, "Fear Of The Dark", 436, 0.99, ['irm' => $artists['irm'],]),
    ];

    $albums = [
        'rtl' => new Album(
            1,
            'Ride the lightning',
            new DateTime("1984/07/27"),
            8,
            7.99,
            [
                'ffwf' => $songs['ffwf'],
                'rtl' => $songs['rtl'],
                'fwtbt' => $songs['fwtbt'],
                'ftb' => $songs['ftb'],
                'tui' => $songs['tui'],
                'esc' => $songs['esc'],
                'crd' => $songs['crd'],
                'fcok' => $songs['fcok'],
            ]
        ),
        'rtlrem' => new Album(2, 'Ride the lightning Remastered', new DateTime("2016/04/15"), 10, 8.49, [
            'ffwf' => $songs['ffwf'],
            'rtl' => $songs['rtl'],
            'fwtbt' => $songs['fwtbt'],
            'ftb' => $songs['ftb'],
            'tui' => $songs['tui'],
            'esc' => $songs['esc'],
            'crd' => $songs['crd'],
            'fcok' => $songs['fcok'],
            'tri' => $songs['tri'],
        ]),
        'fotd' => new Album(3, 'Fear Of The Dark', new DateTime("1992/05/11"), 12, 9.99, [
            'bqobd' => $songs['bqobd'],
            'fhte' => $songs['fhte'],
            'atss' => $songs['atss'],
            'fitk' => $songs['fitk'],
            'cse' => $songs['cse'],
            'wal' => $songs['wal'],
            'tfu' => $songs['tfu'],
            'com' => $songs['com'],
            'tap' => $songs['tap'],
            'jbmg' => $songs['jbmg'],
            'wew' => $songs['wew'],
            'fotd' => $songs['fotd'],
        ]),
    ];

    return ['styles' => $styles, 'artists' => $artists, 'albums' => $albums, 'songs' => $songs,];
}
