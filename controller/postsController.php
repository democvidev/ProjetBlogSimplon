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

    renderPosts('home', compact('posts'));
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

    renderPosts('show', compact('post'));
}

/**
 * Gestion de rendu du template
 *
 * @param string $view
 * @param array $datas
 * @return void
 */
function renderPosts(string $view, array $datas): void
{
    extract($datas);

    ob_start(); // buferise le contenu de la page

    require dirname(__DIR__) . '/view/posts/'. $view .'.php';

    $content = ob_get_clean();

    require dirname(__DIR__) . '/view/base.php';
}
