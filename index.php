<?php

// redirection sur la home page
$page = isset($_GET['page']) ? $_GET['page'] : 'post.home';

ob_start(); // buferiser le contenu de la page

try {
    //code...
    if ($page === 'post.home') {
        require 'home.php';
    } elseif ($page === 'post.show') {
        require 'show.php';
    } elseif ($page === 'user.connect') {
        require 'connectionForm.php';
    } else {
        throw new Exception('404');
    }
} catch (Exception $e) {
    require 'error' . $e->getMessage() . '.php';
}

$content = ob_get_clean();



// ob_start();
// require 'home.php';
// $content = ob_get_clean();

require 'base.php';
