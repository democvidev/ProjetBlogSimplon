<?php

require 'controller.php';

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

    render('posts/home', compact('posts'), $title);
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

    render('posts/show', compact('post'), $post['title']);
}

/**
 * Gestion de suppresions
 *
 * @return void
 */
function delete(): void
{
    require dirname(__DIR__) . '/model/postsRepository.php';
    if (empty($_GET['id'])) {
        exit(header('Location: index.php'));
    }
    deletePost($_GET['id']);

    exit(header('Location: index.php'));
}


