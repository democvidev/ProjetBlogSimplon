<?php

// redirection sur la home page
$page = isset($_GET['page']) ? $_GET['page'] : 'post.home';

if ($page === 'post.home') {
    ob_start();
    require 'home.php';
    $content = ob_get_clean();
} elseif ($page === 'post.show') {
    ob_start();
    require 'show.php';
    $content = ob_get_clean();
}


// ob_start();
// require 'home.php';
// $content = ob_get_clean();

require 'base.php';
