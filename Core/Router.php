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
                require $this->path . '/controller/postsController.php';
                home();
            } elseif ($page === 'post.show') {
                require $this->path . '/controller/postsController.php';
                show();
            } elseif ($page === 'post.delete') {
                require $this->path . '/controller/postsController.php';
                delete();
            } elseif ($page === 'user.register') {
                require $this->path . '/controller/usersController.php';
                register();
            } elseif ($page === 'user.connect') {
                require $this->path . '/controller/usersController.php';
                connect();
            } else {
                throw new Exception('404');
            }
        } catch (Exception $e) {
            require $this->path . '/controller/errorsController.php';
            showErrors($e->getMessage());
        }
    }
}
