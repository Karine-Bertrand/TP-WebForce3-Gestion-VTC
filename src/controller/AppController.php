<?php

namespace App\controller;

use AbstractController;
use App\Controller\AbstractController as ControllerAbstractController;

class AppController extends ControllerAbstractController
{

    public static function index()
    {
        echo self::getTwig()->render('app/index.html');
    }
}
