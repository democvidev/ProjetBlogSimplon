<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\DataBase;

// require_once 'DataBase.php';

abstract class Repository implements DataBase
{
    // dès qu'on crée le model de Repository on met en place un variable de connexion à la bdd, en utilisant le constructeur. Elle sera réservée à Repository et ses enfants
    protected $dbh;
    protected $table; // on peut réutiliser les requêtes en chagent le nom de la table

    private static $instace = null; // Pattern singleton permet de se connecter une seule fois à MySQL en stockant la connexion dans la variable $instance

    public function __construct()
    {
        $this->dbh = $this->getDBConnection();
    }

    public function getDBConnection(): \PDO
    {
        if (self::$instace === null) {
            // Mise en place d'un système de déroutage et gestion d'exceptions

            try {
                $dsn = 'mysql:host=' . SERVER . ';dbname=' . DB_NAME;
                $options = [
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                ];
                self::$instace = new \PDO($dsn, USER, PASSWD, $options);
            } catch (\PDOException $e) {
                print 'Erreur !: ' . $e->getMessage() . '<br/>';
                die();
            }
        }
        return self::$instace;
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
        $req->bindValue('id', $id, \PDO::PARAM_INT);
        $req->execute();
        $post = $req->fetch();
        if (!$post) {
            throw new \Exception("L'article $id n'existe pas !");
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
        $req->bindValue('id', $id, \PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }
}
