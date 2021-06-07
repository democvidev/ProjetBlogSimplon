<?php


function connect()
{ 

    render('connectionForm');

}

function render(string $view): void
{

    ob_start(); // buferise le contenu de la page

    require dirname(__DIR__) . '/view/users/'. $view .'.php';

    $content = ob_get_clean();

    require dirname(__DIR__) . '/view/base.php';
}
