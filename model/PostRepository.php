<?php

require_once '../Entity/Post.php';
require_once 'AbstractRepository.php';

class PostRepository extends AbstractRepository
{
    public function findAll(): array
    {
        $dbh = $this->getDBConnection();
        $query = 'SELECT posts.id AS id, title, LEFT(content, 150) AS content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date, users.name AS user FROM posts INNER JOIN users ON posts.user_id = users.id';
        $req = $dbh->query($query);
        $posts = $req->fetchAll();
        $req->closeCursor();
        return $posts;
    }

    public function findOneById(int $id): array
    {
        $dbh = $this->getDBConnection();
        $query = 'SELECT posts.id AS id, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh %imin %ss\') AS date, users.name AS user FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.id =:id;';
        $req = $dbh->prepare($query);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        $post = $req->fetch();
        if (!$post) {
            throw new Exception("L'article $id n'existe pas !");
        }
        $req->closeCursor();
        return $post;
    }

    public function deleteOne(int $id): void
    {
        $dbh = $this->getDBConnection();
        $this->findOneById($id); //vérification si l'article est dans la bdd
        $query = 'DELETE FROM posts WHERE id = :id;';
        $req = $dbh->prepare($query);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }
}
