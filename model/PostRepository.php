<?php

require_once '../Entity/Post.php';
require_once 'Repository.php';

class PostRepository extends Repository
{
    protected $table = "posts";

    /**
     * Retourne une liste des articles
     *
     * @return array
     */
    public function findAll(): array
    {
        $query = 'SELECT posts.id AS id, title, LEFT(content, 150) AS content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date, users.name AS user FROM posts INNER JOIN users ON posts.user_id = users.id';
        $req = $this->dbh->query($query);
        $posts = $req->fetchAll();
        $req->closeCursor();
        return $posts;
    }

    /**
     * Retourne un seul article
     *
     * @param integer $id
     * @return array
     */
    public function findOneById(int $id): array
    {
        $query = 'SELECT posts.id AS id, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh %imin %ss\') AS date, users.name AS user FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.id =:id;';
        $req = $this->dbh->prepare($query);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        $post = $req->fetch();
        if (!$post) {
            throw new Exception("L'article $id n'existe pas !");
        }
        $req->closeCursor();
        return $post;
    }
    
}
