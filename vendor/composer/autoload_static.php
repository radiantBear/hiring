<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit12a904068f331c0cb47e33bce07749ab
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit12a904068f331c0cb47e33bce07749ab::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit12a904068f331c0cb47e33bce07749ab::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit12a904068f331c0cb47e33bce07749ab::$classMap;

        }, null, ClassLoader::class);
    }
}
