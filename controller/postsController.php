<?php

/**
 * Gestion de la page home.php
 *
 * @return void
 */
function home():void
{
    $title = "Page d'Accueil";
    require dirname(__DIR__) . '/model/postsRepository.php';
    
    $posts = showAllPosts();

    render('home', compact('posts'), $title);
}

/**
 * Gestion de la page show.php
 *
 * @return void
 */
function show():void
{
    require dirname(__DIR__) . '/model/postsRepository.php';
    if (empty($_GET['id'])) {
        exit(header('Location: index.php'));
    }
    $post = findOneById($_GET['id']);

    render('show', compact('post'), $post['title']);
}

function delete()
{
    require dirname(__DIR__) . '/model/postsRepository.php';
    if (empty($_GET['id'])) {
        exit(header('Location: index.php'));
    }
    deletePost($_GET['id']);

    exit(header('Location: index.php'));
}


/**
 * Gestion de rendu du template
 *
 * @param string $view
 * @param array $datas
 * @return void
 */
function render(string $view, array $datas, $pageTitle): void
{
    extract($datas);

    ob_start(); // buferise le contenu de la page
    require dirname(__DIR__) . '/view/posts/'. $view .'.php';
    
    $title = $pageTitle;
    $content = ob_get_clean();

    require dirname(__DIR__) . '/view/base.php';
}


