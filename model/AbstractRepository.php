<?php

abstract class AbstractRepository
{
    /**
     * Connexion à la base de données
     *
     * @return PDO
     */
    protected function getDBConnection(): \PDO
    {
        // Couche d'accès au données
        $user = "root";
        $pass = "";
        $dbname = "bd_blog_simplon";
        $host = 'localhost';

        // Mise en place d'un système de déroutage et gestion d'exceptions

        try {
            $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
            $options = [
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    ];
            return new \PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
