<?php

use App\Core\Router;

// remonte d'un cran dans le dossier parent et va dans le fichier Router.php
require dirname(__DIR__) . '/Core/Router.php';

// instancier l'objet router
$router = new Router();
$router->run(); // appelle la methode run sur l'objet instancié



