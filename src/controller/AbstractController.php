<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class AbstractController {

    public static function getTwig() {
        $loader = new FilesystemLoader(__DIR__ . '/../../views');
        $twig = new Environment($loader);
        $twig->addGlobal('assets',  BASE_PATH . '/assets' );
        $twig->addGlobal('base_path',  BASE_PATH);

        return $twig;
    }

}