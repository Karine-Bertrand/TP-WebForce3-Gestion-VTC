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
$router->get('vehicules', 'VehiculeController@list');
$router->get('conducteurs', 'ConducteurController@list');
$router->get('associations', 'AssociationController@list');

/**
 * fonctions de création de nouvel element pour chaque table
 */
$router->post('vehicule/new', 'VehiculeController@new');
$router->post('conducteur/new', 'ConducteurController@new');
$router->post('association/new', 'AssociationController@new');


/**
 * suppression d'un enregistrement
 */
$router->get('vehicule/{d+}/delete', 'VehiculeController@delete');
$router->get('conducteur/{d+}/delete', 'ConducteurController@delete');
$router->get('association/{d+}/delete', 'AssociationController@delete');

/**
 * ouvre le formualire edit d'un enregistrement
 * Action réalisée : Formulaire d'édition d'articles qui envoie en POST
 */
$router->get('vehicule/{\d+}/edit', 'VehiculeController@edit');
$router->get('conducteur/{\d+}/edit', 'ConducteurController@edit');
$router->get('association/{\d+}/edit', 'AssociationController@edit');

/**
 * update de l'enregistrement ouvert sur le formulaire par 'edit'
 * Action réalisée : Édite un enregistrement grâce aux données $_POST
 */
$router->post('vehicule/{\d+}/edit', 'VehiculeController@update');
$router->post('conducteur/{\d+}/edit', 'ConducteurController@update');
$router->post('association/{\d+}/edit', 'AssociationController@update');


$router->run();

