<?php

class Router
{
    private $path; // l'attribut stocke le chemin vers la racine du site : dirname(__DIR__)

    public function __construct()
    {
        $this->path = dirname(__DIR__);
    }

    /**
     * Gestion des routes url
     *
     * @return void
     */
    public function run(): void
    {
        try {
            // redirection sur la home page
            $page = isset($_GET['page']) ? $_GET['page'] : 'post.home';

            if ($page === 'post.home') {
                require $this->path . '/Controller/PostController.php';
                $postController = new PostController;
                $postController->home();
            } elseif ($page === 'post.show') {
                require $this->path . '/Controller/PostController.php';
                $postController = new PostController;
                $postController->show();
            } elseif ($page === 'post.delete') {
                require $this->path . '/Controller/PostController.php';
                $postController = new PostController;
                $postController->delete();
            } elseif ($page === 'user.register') {
                require $this->path . '/Controller/UserController.php';
                $postController = new UserController;
                $postController->register();
            } elseif ($page === 'user.connect') {
                require $this->path . '/Controller/UserController.php';
                $postController = new UserController;
                $postController->connect();
            } elseif ($page === 'comment.post') {
                require $this->path . '/Controller/CommentController.php';
                $commentController = new CommentController;
                $commentController->comment();
            } else {
                throw new Exception('404');
            }
        } catch (Exception $e) {
            require $this->path . '/Controller/ErrorController.php';
            $errorController = new ErrorController;
            $errorController->showErrors($e->getMessage());
        }
    }
}
