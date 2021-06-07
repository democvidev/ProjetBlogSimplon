<?php

function showErrors($error)
{
    render($error);

}

function render(string $view): void
{
    ob_start(); // buferise le contenu de la page

    require dirname(__DIR__) . '/view/errors/error' . $view . '.php';

    $content = ob_get_clean();

    require dirname(__DIR__) . '/view/base.php';
}
