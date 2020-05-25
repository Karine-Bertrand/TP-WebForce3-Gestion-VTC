<?php

use Bramus\Router\Router;

$router = new Router();

$router->setNamespace('App\Controller');

/**
 * Insérez vos routes ici
 */

$router->get('/', 'AppController@index');
/**
 * affichage des listes depuis la navbar :
 */
$router->get('conducteurs', 'ConducteurController@list');
$router->get('vehicules', 'VehiculeController@list');
$router->get('associations', 'AssociationController@list');

$router->post('vehicule/new', 'VehiculeController@new');
$router->post('conducteur/new', 'ConducteurController@new');
$router->post('association/new', 'AssociationController@new');

$router->run();

