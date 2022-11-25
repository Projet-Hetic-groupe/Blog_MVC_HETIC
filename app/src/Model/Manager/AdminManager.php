<?php

namespace App\Model\Manager;

use App\Base\BaseManager;
use App\Model\Entity\User;


class AdminManager extends BaseManager
{

    public function getAllUsers(): array
    {
        $query = $this->pdo->query("select * from `Users`");
        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new User($data);
        }

        return $users;
    }

    public function editUser($id,$lastname,$firstname,$login,$role): void
    {
        $sql = "update `Users` set `lastname` = :lastName ,`firstname` = :firstName,`login` = :login,`role` = :role where `id` = $id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(':lastName', $lastname, \PDO::PARAM_STR);
        $query->bindValue(':firstName', $firstname, \PDO::PARAM_STR);
        $query->bindValue(':login', $login, \PDO::PARAM_STR);
        $query->bindValue(':role', $role, \PDO::PARAM_STR);
        $query->execute();
    }

    public function deleteUser($id): void
    {

        $sql = "DELETE FROM `Users` WHERE `id` = $id";

        $query = $this->pdo->query($sql);

        $query->execute();
    }
}
