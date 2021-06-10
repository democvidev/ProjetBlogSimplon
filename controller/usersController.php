<?php

/**
 * Gestion de la page de connexion
 *
 * @return void
 */
function connect(): void
{ 
    $title = "Page Connexion";
    render('connectionForm', $title);
}

/**
 * Gestion du rendu de la connexion
 *
 * @param string $view
 * @return void
 */
function render(string $view, $pageTitle): void
{

    ob_start(); // buferise le contenu de la page

    require dirname(__DIR__) . '/view/users/'. $view .'.php';
    $title = $pageTitle;
    $content = ob_get_clean();

    require dirname(__DIR__) . '/view/base.php';
}
