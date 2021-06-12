<?php

require_once '../Entity/Post.php';
require_once 'AbstractRepository.php';

class PostRepository extends AbstractRepository
{
    // dès qu'on crée le model des Posts on met en place un variable de connexion à la bdd, en utilisant le constructeur
    private $dbh;

    public function __construct()
    {
        $this->dbh = $this->getDBConnection();
    }

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

    /**
     * Supprime un article
     *
     * @param integer $id
     * @return void
     */
    public function deleteOne(int $id): void
    {
        $this->findOneById($id); //vérification si l'article est dans la bdd
        $query = 'DELETE FROM posts WHERE id = :id;';
        $req = $this->dbh->prepare($query);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }
}
