<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita215d1ad8d61d62fde51c3b998d33290
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LINE\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LINE\\' => 
        array (
            0 => __DIR__ . '/..' . '/linecorp/line-bot-sdk/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita215d1ad8d61d62fde51c3b998d33290::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita215d1ad8d61d62fde51c3b998d33290::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
