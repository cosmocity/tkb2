<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc887e2eeb1bd8193cac9d9eb7fbd09e6
{
    public static $classMap = array (
        'Firebase\\Error' => __DIR__ . '/..' . '/ktamas77/firebase-php/src/firebaseStub.php',
        'Firebase\\FirebaseInterface' => __DIR__ . '/..' . '/ktamas77/firebase-php/src/firebaseInterface.php',
        'Firebase\\FirebaseLib' => __DIR__ . '/..' . '/ktamas77/firebase-php/src/firebaseLib.php',
        'Firebase\\FirebaseStub' => __DIR__ . '/..' . '/ktamas77/firebase-php/src/firebaseStub.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitc887e2eeb1bd8193cac9d9eb7fbd09e6::$classMap;

        }, null, ClassLoader::class);
    }
}