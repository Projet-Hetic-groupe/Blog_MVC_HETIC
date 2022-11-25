<?php
namespace App\Controller;

use App\Base\BaseController;
use App\Base\BaseManager;
use App\Model\Factory\PDO;
use App\Model\Manager\UserManager;
use App\Model\Route\Route;

final class UserController extends BaseController
{
    #[Route('/register', name: "registerShowForm", methods: ["GET"])]
    public function registerForm(){
        self::isNotConnected();
        $this->render("Security/register.php", [], "register","../public/css/security/register.css");
    }

    #[Route('/register',name:"register",methods:['POST'])]
    public function register(){
        if (!empty($_POST)) {
            if (isset($_POST["lastname"], $_POST["firstname"], $_POST["login"], $_POST['password'], $_POST["role"]) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST["role"])) {

                // Hash password
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $lastname = strip_tags($_POST['lastname']);
                $firstname = strip_tags($_POST['firstname']);
                $login = strip_tags($_POST['login']);
                $role = strip_tags($_POST['role']);

                $connectionPdo = new UserManager(new PDO());
                $id = ($connectionPdo->addUser($lastname, $firstname, $login, $password, $role));

                $_SESSION["user"] = [
                    "id" => $id,
                    "login" => $login,
                    "lastname" => $lastname,
                    "firstname" => $firstname,
                    "role" => $role,
                ];

                header("Location: http://localhost:2711/", 301);
                exit;
            }
        }

        header("Location: http://localhost:2711/register", 301);
        exit;
    }


    #[Route('/logout', name: "logout", methods: ["GET"])]
    public function logout()
    {
        if(!isset($_SESSION["user"])){
            header("Location: http://localhost:2711/", 301);
            exit;
        }
        unset($_SESSION["user"]);
        header("Location: http://localhost:2711/", 301);
    }
//
//    #[Route('/login', name: "login", methods: ["GET"])]
//    public function login()
//    {
//        if(isset($_SESSION["user"]))
//        {
//            header("Location: http://localhost:2711/", 301);
//            exit;
//        }
//
//        $_SESSION["user"]=[
//            "login" => "admin",
//            "role" => "admin",
//            "id" => "1",
//        ];
//        header("Location: http://localhost:2711/", 301);
//        exit;
//    }
}