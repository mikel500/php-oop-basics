<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit899092e2fc28988de40486bddd58012d
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit899092e2fc28988de40486bddd58012d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit899092e2fc28988de40486bddd58012d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit899092e2fc28988de40486bddd58012d::$classMap;

        }, null, ClassLoader::class);
    }
}
