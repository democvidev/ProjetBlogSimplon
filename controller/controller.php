<?php

/**
 * Gestion de rendu du template
 *
 * @param string $view
 * @param array $datas
 * @return void
 */
function render(string $view, array $datas = [], $pageTitle): void
{
    extract($datas);

    ob_start(); // buferise le contenu de la page
    require dirname(__DIR__) . '/view/'. $view .'.php';
    
    $title = $pageTitle;
    $content = ob_get_clean();

    require dirname(__DIR__) . '/view/base.php';
}
