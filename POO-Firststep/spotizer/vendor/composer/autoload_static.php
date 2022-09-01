<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd13868b6307aec8e04f0e8f854ffc0a6
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Entity',
        ),
    );

    public static $classMap = array (
        'App\\Album' => __DIR__ . '/../..' . '/src/Entity/Album.php',
        'App\\AlbumSong' => __DIR__ . '/../..' . '/src/Entity/AlbumSong.php',
        'App\\Artist' => __DIR__ . '/../..' . '/src/Entity/Artist.php',
        'App\\ArtistStyle' => __DIR__ . '/../..' . '/src/Entity/ArtistStyle.php',
        'App\\Song' => __DIR__ . '/../..' . '/src/Entity/Song.php',
        'App\\Style' => __DIR__ . '/../..' . '/src/Entity/Style.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd13868b6307aec8e04f0e8f854ffc0a6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd13868b6307aec8e04f0e8f854ffc0a6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd13868b6307aec8e04f0e8f854ffc0a6::$classMap;

        }, null, ClassLoader::class);
    }
}