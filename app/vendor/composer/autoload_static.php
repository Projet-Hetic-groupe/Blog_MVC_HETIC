<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf5c1571c199c37acff9fa445a65f9fde
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitf5c1571c199c37acff9fa445a65f9fde::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf5c1571c199c37acff9fa445a65f9fde::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf5c1571c199c37acff9fa445a65f9fde::$classMap;

        }, null, ClassLoader::class);
    }
}
