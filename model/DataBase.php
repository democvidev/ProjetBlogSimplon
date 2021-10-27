<?php

namespace App\Model;

interface DataBase
{
    public function getDBConnection(): \PDO;
}
