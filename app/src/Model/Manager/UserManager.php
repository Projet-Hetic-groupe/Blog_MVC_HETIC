<?php

namespace App\Model\Manager;

use App\Base\BaseManager;
use App\Model\Entity\User;

class UserManager extends BaseManager
{

    public function login($login,$password):User
    {


        $sql = "select `id`,`lastName`,`firstName`,`login`,`role`,`password` from `Users` where `login` = :login";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(':login', $login, \PDO::PARAM_STR);

        $query->execute();

        $response = $query->fetch();

        if(!$response){
            echo "pas trouver";
            exit();
        }


        if(!password_verify($password,$response["password"])){
            "pas trouver pas de mdp";
            exit();
        }

        $user = new User($response);
        return $user;
    }
}