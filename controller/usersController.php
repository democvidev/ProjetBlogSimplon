<?php

/**
 * Gestion de la page de connexion
 *
 * @return void
 */
function connect(): void
{ 
    render('connectionForm');
}

/**
 * Gestion du rendu de la connexion
 *
 * @param string $view
 * @return void
 */
function render(string $view): void
{

    ob_start(); // buferise le contenu de la page

    require dirname(__DIR__) . '/view/users/'. $view .'.php';

    $content = ob_get_clean();

    require dirname(__DIR__) . '/view/base.php';
}
