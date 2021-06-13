<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\CommentRepository;

require_once 'AbstractController.php';
require_once dirname(__DIR__) . '/Model/CommentRepository.php';


class CommentController extends AbstractController
{
    protected $modelName = CommentRepository::class;

    /**
     * Gestion d'insérer le commentaire
     *
     * @return void
     */
    public function comment(): void
    {
        $this->model->insertComment($_POST);
        $this->redirect("index.php?page=post.show&id=" . $_POST['post_id']);
    }

    /**
     * Undocumented function
     *
     * @param integer $post_id
     * @return array
     */
    public function showC(int $post_id): array
    {
        $comments = $this->model->findAllComment($post_id);
        return $comments;
    }
}