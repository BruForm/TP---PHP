<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit89053d3c6f02170f886e6d799f0c863c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit89053d3c6f02170f886e6d799f0c863c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit89053d3c6f02170f886e6d799f0c863c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit89053d3c6f02170f886e6d799f0c863c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
