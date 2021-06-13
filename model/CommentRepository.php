<?php

namespace App\Model;

use App\Model\Repository;

// require_once '../Entity/Comment.php';
require_once 'Repository.php';

class CommentRepository extends Repository
{
    /**
     * Insére un commentaire dans la bdd
     *
     * @param array $datas
     * @return void
     */
    public function insertComment(array $datas): void
    {
        $query = 'INSERT INTO comments(author, content, created_at, post_id) VALUES(:name, :content, Now(), :post_id);';
        $req = $this->dbh->prepare($query);
        $req->bindValue('name', $datas['author'], \PDO::PARAM_STR);
        $req->bindValue('content', $datas['comment_content'], \PDO::PARAM_STR);
        $req->bindValue('post_id', $datas['post_id'], \PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * Retourne tous les commentaires d'un article
     *
     * @param integer $post_id
     * @return array
     */
    public function findAllComment(int $post_id): array
    {
        $query = 'SELECT comments.content, comments.author, comments.created_at FROM comments INNER JOIN posts ON posts.id = comments.post_id WHERE posts.id =:id;';
        $req = $this->dbh->prepare($query);
        $req->bindValue('id', $post_id, \PDO::PARAM_INT);
        $req->execute();
        $comments = $req->fetchAll();        
        $req->closeCursor();
        return $comments;
    }
}