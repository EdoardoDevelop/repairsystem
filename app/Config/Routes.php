<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

$routes->get('/', 'Dashboard::index');

$routes->get('/inserimento', 'Riparazioni::inserisci');
$routes->post('/salva-dati', 'Riparazioni::salva');
$routes->get('/visualizza-schede', 'Riparazioni::visualizzaTutte');
$routes->get('/modifica-scheda/(:num)', 'Riparazioni::modificaScheda/$1');
$routes->post('/aggiorna-scheda/(:num)', 'Riparazioni::aggiornaScheda/$1');
$routes->get('/elimina-scheda/(:num)', 'Riparazioni::eliminaScheda/$1');
$routes->get('/stampa-scheda/(:num)', 'Riparazioni::stampaScheda/$1');


$routes->get('/clienti', 'Clienti::visualizza');
$routes->get('/clienti/inserisci', 'Clienti::inserisci');
$routes->post('/clienti/salva', 'Clienti::salva');
$routes->get('/clienti/modifica/(:num)', 'Clienti::modifica/$1');
$routes->post('/clienti/aggiorna/(:num)', 'Clienti::aggiorna/$1');
$routes->delete('/clienti/elimina/(:num)', 'Clienti::elimina/$1');
$routes->get('/clienti/cerca', 'Clienti::cerca');

