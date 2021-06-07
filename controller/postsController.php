<?php

/**
 * Gestion de la page home.php
 *
 * @return void
 */
function home():void
{
    require dirname(__DIR__) . '/model/postsRepository.php';
    
    $posts = showAllPosts();

    render('home', compact('posts'));
}

/**
 * Gestion de la page show.php
 *
 * @return void
 */
function show():void
{
    require dirname(__DIR__) . '/model/postsRepository.php';

    $post = findOneById($_GET['id']);

    render('show', compact('post'));
}

/**
 * Gestion de rendu du template
 *
 * @param string $view
 * @param array $datas
 * @return void
 */
function render(string $view, array $datas): void
{
    extract($datas);

    ob_start(); // buferise le contenu de la page

    require dirname(__DIR__) . '/view/posts/'. $view .'.php';

    $content = ob_get_clean();

    require dirname(__DIR__) . '/view/base.php';
}
