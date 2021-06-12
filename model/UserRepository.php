<?php

require_once 'AbstractRepository.php';

class UserRepository extends AbstractRepository
{

    private $dbh;

    public function __construct()
    {
        $this->dbh = $this->getDBConnection();
    }

    public function insertOne(array $data): void
    {
        $query = 'INSERT INTO users(name, email, password, created_at) VALUES(:name, :email, :password, Now());';
        $req = $this->dbh->prepare($query);
        $req->bindValue('name', $data['name'], PDO::PARAM_STR);
        $req->bindValue('email', $data['email'], PDO::PARAM_STR);
        $req->bindValue('password', $data['password'], PDO::PARAM_STR);
        $req->execute();
    }
}
