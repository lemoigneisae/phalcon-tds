<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc7b8ee59d3559484864d1fc8fab46a52
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Ajax\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ajax\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmv/php-mv-ui/Ajax',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc7b8ee59d3559484864d1fc8fab46a52::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc7b8ee59d3559484864d1fc8fab46a52::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
