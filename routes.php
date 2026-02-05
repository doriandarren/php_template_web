<?php


$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');


// Notes
$router->get('/notes', 'controllers/notes/index.php');          // Es para cargar la view de lista de las notas
$router->get('/note', 'controllers/notes/show.php');            // Es para cargar la view de la nota
$router->delete('/note', 'controllers/notes/destroy.php');      // Es para eliminar la nota

$router->get('/notes/create', 'controllers/notes/create.php');  // Es para cargar la view de la nota
$router->post('/notes', 'controllers/notes/store.php');         // Es para guardar la nota
