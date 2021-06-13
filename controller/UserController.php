<?php

namespace App\Controller;

use App\Model\UserRepository;
use App\Controller\AbstractController;

require_once 'AbstractController.php';
require_once dirname(__DIR__) . '/Model/UserRepository.php';

class UserController extends AbstractController
{

    protected $modelName = UserRepository::class;

    /**
     * Gestion de l'inscription
     *
     * @return void
     */
    public function register(): void
    {
        $title = "Page d'inscription";
        $errors = $this->isValidForm($_POST);
        if ($errors !== []) {
            $this->render('users/registerForm', $errors, $title);
            exit();
        }
        if (!empty($_POST)) {
            $this->model->insertOne($_POST);
            $this->redirect('index.php');
        }
    
        $this->render('users/registerForm', [], $title);
    }

    /**
     * Gestion de la page de connexion
     *
     * @return void
     */
    public function connect(): void
    {
        $title = "Page Connexion";
        $this->render('users/connectionForm', [], $title);
    }
}
