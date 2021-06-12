<?php

require_once 'AbstractController.php';
require_once dirname(__DIR__) . '/model/PostRepository.php';

class PostController extends AbstractController
{
    private $viewRepertory = 'post/';

    /**
     * Gestion de la page home.php
     *
     * @return void
     */
    public function home():void
    {
        $postRepository = new PostRepository;
        $title = "Page d'Accueil";
    
        $posts = $postRepository->findAll();

        $this->render($this->viewRepertory . 'home', compact('posts'), $title);
    }

    /**
     * Gestion de la page show.php
     *
     * @return void
     */
    public function show():void
    {
        require dirname(__DIR__) . '/model/postsRepository.php';
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            throw new Exception("Vous n'avez pas précisé l'id de l'article !");
        }
        $post = findOneById($_GET['id']);

        render('posts/show', compact('post'), $post['title']);
    }

    /**
     * Gestion de suppresions
     *
     * @return void
     */
    public function delete(): void
    {
        require dirname(__DIR__) . '/model/postsRepository.php';
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            throw new Exception("Vous n'avez pas précisé l'id de l'article !");
        }
        deleteOne($_GET['id']);

        redirect('index.php');
    }
}
