<?php

use Bramus\Router\Router;

$router = new Router();

$router->setNamespace('App\Controller');

/**
 * Insérez vos routes ici
 */

$router->get('/', 'AppController@index');

$router->get('conducteurs', 'ConducteurController@list');
$router->get('vehicules', 'VehiculeController@list');
$router->get('associations', 'AssociationController@list');

$router->run();

