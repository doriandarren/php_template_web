<?php

require 'functions.php';


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];



function abort($code) {
    http_response_code($code);
    require 'views/{$code}.view.php';  
    die();
}


$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];



if(array_key_exists($uri, $routes)){
    
    require $routes[$uri];

} else {

   abort(404);

}