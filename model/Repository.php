<?php

require_once 'DataBase.php';

class Repository extends DataBase
{
    // dès qu'on crée le model des Posts on met en place un variable de connexion à la bdd, en utilisant le constructeur. Elle sera réservée à Repository et ses enfants
    protected $dbh;

    public function __construct()
    {
        $this->dbh = $this->getDBConnection();
    }
}
