<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit45fb05da34611c7577fce384308927ba
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
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'App\\Entity\\Actor' => __DIR__ . '/../..' . '/src/Entity/Actor.php',
        'App\\Entity\\Compositor' => __DIR__ . '/../..' . '/src/Entity/Compositor.php',
        'App\\Entity\\Director' => __DIR__ . '/../..' . '/src/Entity/Director.php',
        'App\\Entity\\Movie' => __DIR__ . '/../..' . '/src/Entity/Movie.php',
        'App\\Entity\\StaffMember' => __DIR__ . '/../..' . '/src/Entity/StaffMember.php',
        'App\\Repository\\Actor_repo' => __DIR__ . '/../..' . '/src/Repository/Actor_repo.php',
        'App\\Repository\\Compositor_repo' => __DIR__ . '/../..' . '/src/Repository/Compositor_repo.php',
        'App\\Repository\\DBmanager' => __DIR__ . '/../..' . '/src/Repository/DBmanager.php',
        'App\\Repository\\Director_repo' => __DIR__ . '/../..' . '/src/Repository/Director_repo.php',
        'App\\Repository\\Movie_repo' => __DIR__ . '/../..' . '/src/Repository/Movie_repo.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit45fb05da34611c7577fce384308927ba::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit45fb05da34611c7577fce384308927ba::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit45fb05da34611c7577fce384308927ba::$classMap;

        }, null, ClassLoader::class);
    }
}
