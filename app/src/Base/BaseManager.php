<?php

namespace App\Base;

use App\Model\Interfaces\Database;

abstract class BaseManager
{
    protected \PDO $pdo;
    public function __construct(Database $database)
    {
        $this->pdo = $database->getMySqlPDO();
    }

    public function addUser($lastname,$firstname,$login,$password,$role): int
    {

        $sql = "INSERT INTO `Users` (`lastName`,`firstName`,`login`,`password`,`role`) VALUES (:lastName, :firstName, :login, :password,:role)";

        $query = $this->pdo->prepare($sql);

        $query->bindValue(':lastName', $lastname, \PDO::PARAM_STR);

        $query->bindValue(':firstName', $firstname, \PDO::PARAM_STR);
        $query->bindValue(':login', $login, \PDO::PARAM_STR);
        $query->bindValue(':password', $password, \PDO::PARAM_STR);
        $query->bindValue(':role', $role, \PDO::PARAM_STR);

        $query->execute();


        return $id = $this->pdo->lastInsertId();
    }

}
