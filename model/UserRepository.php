<?php

require_once 'AbstractRepository.php';

class UserRepository extends AbstractRepository
{
    public function insertOne(array $data): void
    {
        // var_dump($data); die;
        $dbh = $this->getDBConnection();
        $query = 'INSERT INTO users(name, email, password, created_at) VALUES(:name, :email, :password, Now());';
        $req = $dbh->prepare($query);
        $req->bindValue('name', $data['name'], PDO::PARAM_STR);
        $req->bindValue('email', $data['email'], PDO::PARAM_STR);
        $req->bindValue('password', $data['password'], PDO::PARAM_STR);
        $req->execute();
    }
}
