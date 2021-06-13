<?php

namespace App\Model;

use App\Model\Repository;

require_once 'Repository.php';

class UserRepository extends Repository
{
    protected $table = "users";

    /**
     * Enregistre un utilisateur dans la bdd
     *
     * @param array $data
     * @return void
     */
    public function insertOne(array $data): void
    {
        $query = 'INSERT INTO users(name, email, password, created_at) VALUES(:name, :email, :password, Now());';
        $req = $this->dbh->prepare($query);
        $req->bindValue('name', $data['name'], \PDO::PARAM_STR);
        $req->bindValue('email', $data['email'], \PDO::PARAM_STR);
        $req->bindValue('password', $data['password'], \PDO::PARAM_STR);
        $req->execute();
    }
}
