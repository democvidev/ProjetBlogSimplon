<?php

require_once 'model.php';


function findAll(): array
{
    $dbh = getDBConnection();
    $query = 'SELECT posts.id AS id, title, LEFT(content, 150) AS content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date, users.name AS user FROM posts INNER JOIN users ON posts.user_id = users.id';
    $req = $dbh->query($query);
    $tab = $req->fetchAll();
    $req->closeCursor();
    return $tab;
}

function findOneById(int $id): array
{
    $dbh = getDBConnection();
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

function deleteOne(int $id): void
{
    $dbh = getDBConnection();
    findOneById($id); //vérification si l'article est dans la bdd
    $query = 'DELETE FROM posts WHERE id = :id;';
    $req = $dbh->prepare($query);
    $req->bindValue('id', $id, PDO::PARAM_INT);
    $req->execute();
    $req->closeCursor();
}
