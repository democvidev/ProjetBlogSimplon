<?php

namespace App\Model;

abstract class DataBase
{
    private static $instace = null; // Pattern singleton permet de se connecter une seule fois à MySQL en stockant la connexion dans la variable $instance

    // Couche d'accès au données
    private $user = "root";
    private $pass = "";
    private $dbname = "bd_blog_simplon";
    private $host = 'localhost';

    public function __construct($host=null, $user=null, $pass=null, $dbname=null)
    {
        if ($host != null) {
            $this->host = $host;
            $this->user = $user;
            $this->pass = $pass;
            $this->dbname = $dbname;
        }
    }

    protected function getDBConnection(): \PDO
    {
        if (self::$instace === null) {

            // Mise en place d'un système de déroutage et gestion d'exceptions
            
            try {
                $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
                $options = [
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                ];
                self::$instace = new \PDO($dsn, $this->user, $this->pass, $options);
            } catch (\PDOException $e) {
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        return self::$instace;
    }
}
