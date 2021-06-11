<?php

/**
 * Gestion de rendu du template et son affichage
 *
 * @param string $view
 * @param array $datas
 * @return void
 */
function render(string $view, array $datas = [], $pageTitle = null): void
{
    extract($datas);

    ob_start(); // buferise le contenu de la page
    require dirname(__DIR__) . '/view/'. $view .'.php';
    
    $title = $pageTitle;
    $content = ob_get_clean();

    require dirname(__DIR__) . '/view/base.php';
}

/**
 * Gestion des redirections
 *
 * @param string $url
 * @return void
 */
function redirect(string $url): void
{
    exit(header("Location: $url"));
}
