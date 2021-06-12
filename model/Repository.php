<?php

require_once 'DataBase.php';

class Repository extends DataBase
{
    // dès qu'on crée le model des Posts on met en place un variable de connexion à la bdd, en utilisant le constructeur. Elle sera réservée à Repository et ses enfants
    protected $dbh;
    protected $table; // on peut réutiliser les requêtes en chagent le nom de la table

    public function __construct()
    {
        $this->dbh = $this->getDBConnection();
    }

    /**
     * Retourne un seul article
     *
     * @param integer $id
     * @return array
     */
    public function find(int $id): array
    {
        $query = "SELECT * FROM {$this->table} WHERE id =:id;";
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
        $this->find($id); //vérification si l'article est dans la bdd
        $query = "DELETE FROM {$this->table} WHERE id=:id";
        $req = $this->dbh->prepare($query);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }
}
