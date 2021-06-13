<?php

require_once 'AbstractController.php';
require_once dirname(__DIR__) . '/Model/CommentRepository.php';


class CommentController extends AbstractController
{
    /**
     * Gestion d'insérer le commentaire
     *
     * @return void
     */
    public function comment(): void
    {
        $commentRepository = new CommentRepository;
        $commentRepository->insertComment($_POST);
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
        $commentRepository = new CommentRepository;
        $comments = $commentRepository->findAllComment($post_id);
        return $comments;
    }
}