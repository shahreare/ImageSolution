<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf67740998af6872d0314601e9dff2826
{
    public static $prefixesPsr0 = array (
        'I' => 
        array (
            'Imagesolution' => 
            array (
                0 => __DIR__ . '/../..' . '/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitf67740998af6872d0314601e9dff2826::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
