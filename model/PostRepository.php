<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Repository;

// require_once '../Entity/Post.php';
// require_once 'Repository.php';

class PostRepository extends Repository
{
    protected $table = 'posts';

    /**
     * Retourne une liste des articles
     *
     * @return array
     */
    public function findAll(): array
    {
        $query =
            'SELECT posts.id AS id, art_title, LEFT(art_description, 150) AS description, DATE_FORMAT(art_date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date, users.name AS user FROM posts INNER JOIN users ON posts.art_author = users.id';
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
        $query =
            'SELECT posts.id AS id, art_title, art_content, DATE_FORMAT(art_date_creation, \'%d/%m/%Y à %Hh %imin %ss\') AS date, users.name AS user FROM posts INNER JOIN users ON posts.art_author = users.id WHERE posts.id =:id;';
        $req = $this->dbh->prepare($query);
        $req->bindValue('id', $id, \PDO::PARAM_INT);
        $req->execute();
        $post = $req->fetch();
        if (!$post) {
            throw new \Exception("L'article $id n'existe pas !");
        }
        $req->closeCursor();
        return $post;
    }
}
