<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit00fc211a09f53a2bb2c526569ba62a4d
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'app\\classes\\Cart' => __DIR__ . '/../..' . '/app/classes/Cart.php',
        'app\\interfaces\\Cart_interface' => __DIR__ . '/../..' . '/app/interfaces/Cart_interface.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit00fc211a09f53a2bb2c526569ba62a4d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit00fc211a09f53a2bb2c526569ba62a4d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit00fc211a09f53a2bb2c526569ba62a4d::$classMap;

        }, null, ClassLoader::class);
    }
}