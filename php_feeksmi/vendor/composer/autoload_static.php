<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit89053d3c6f02170f886e6d799f0c863c
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
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit89053d3c6f02170f886e6d799f0c863c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit89053d3c6f02170f886e6d799f0c863c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit89053d3c6f02170f886e6d799f0c863c::$classMap;

        }, null, ClassLoader::class);
    }
}
