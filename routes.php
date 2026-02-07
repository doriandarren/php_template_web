<?php


$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');


// Notes
$router->get('/notes', 'controllers/notes/index.php')->only('auth');                // Es para cargar la view de lista de las notas
$router->get('/note', 'controllers/notes/show.php');                                // Es para cargar la view de la nota
$router->delete('/note', 'controllers/notes/destroy.php');                          // Es para eliminar la nota

$router->get('/note/edit', 'controllers/notes/edit.php');                           // Es para editar la view de la nota
$router->patch('/note', 'controllers/notes/update.php');                            // Es para cargar la view de la nota

$router->get('/notes/create', 'controllers/notes/create.php');                      // Es para cargar la view de la nota
$router->post('/notes', 'controllers/notes/store.php');                             // Es para guardar la nota


// Register
$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php')->only('guest');


// Login
$router->get('/login', 'controllers/sessions/create.php')->only('guest');
$router->post('/sessions', 'controllers/sessions/store.php')->only('guest');
$router->delete('/sessions', 'controllers/sessions/destroy.php')->only('auth');
