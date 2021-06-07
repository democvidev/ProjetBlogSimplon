<?php

/**
 * Connexion à la base de données
 *
 * @return PDO
 */
function getDBConnection(): PDO
{
    // Couche d'accès au données
    $user = "root";
    $pass = "";
    $dbname = "bd_blog_simplon";
    $host = 'localhost';

    // Mise en place d'un système de déroutage et gestion d'exeptions

    try {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
        $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
        $dbh = new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $dbh;
}


function showAllPosts(): array
{
    $dbh = getDBConnection();
    $query = 'SELECT posts.id AS id, title, LEFT(content, 150) AS content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date, users.name AS user FROM posts INNER JOIN users ON posts.user_id = users.id';
    $req = $dbh->query($query);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $tab = $req->fetchAll();
    $req->closeCursor();
    return $tab;
}

function findOneById(string $id): array
{
    $dbh = getDBConnection();
    $query = 'SELECT posts.id AS id, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date, users.name AS user FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.id =:id;';
    $req = $dbh->prepare($query);
    $req->bindValue('id', $id, PDO::PARAM_INT);
    $req->execute();
    $post = $req->fetch();
    $req->closeCursor();
    return $post;
}
