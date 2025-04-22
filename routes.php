<?php

// return [
//     '/' => 'controllers/index.php',
//     '/about' => 'controllers/about.php',
//     '/real_estates' => 'controllers/real_estates/index.php',
//     '/real_estate' => 'controllers/real_estates/show.php',
//     '/real_estates/create' => 'controllers/real_estates/create.php',
//     '/contact' => 'controllers/contact.php',
// ];

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');


$router->get('/real_estates', 'controllers/real_estates/index.php');
$router->get('/real_estate', 'controllers/real_estates/show.php');
$router->delete('/real_estate', 'controllers/real_estates/destroy.php');


$router->get('/real_estate/edit', 'Controllers/real_estates/edit.php');
$router->patch('/real_estate', 'controllers/real_estates/update.php');

$router->get('/real_estates/create', 'controllers/real_estates/create.php');
$router->post('/real_estates', 'controllers/real_estates/store.php');


