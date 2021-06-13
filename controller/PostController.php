<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\PostRepository;
use App\Controller\CommentController;


require_once 'AbstractController.php';
require_once dirname(__DIR__) . '/Model/PostRepository.php';
require_once 'CommentController.php';

class PostController extends AbstractController
{
    private $viewRepertory = 'posts/';

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
     * @return array
     */
    public function show(): array
    {
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            throw new \Exception("Vous n'avez pas précisé l'id de l'article !");
        }
        $postRepository = new PostRepository;
        $post = $postRepository->findOneById($_GET['id']);
        $commentController = new CommentController;
        $comments = $commentController->showC($post['id']);

        $this->render($this->viewRepertory . 'show', compact('post', 'comments'), $post['title']);
        return $post;
    }

    /**
     * Gestion de suppresions
     *
     * @return void
     */
    public function delete(): void
    {
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            throw new \Exception("Vous n'avez pas précisé l'id de l'article !");
        }
        $postRepository = new PostRepository;
        $postRepository->deleteOne($_GET['id']);
        $this->redirect('index.php');
    }
}
