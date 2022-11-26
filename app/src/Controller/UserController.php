<?php
namespace App\Controller;

use App\Base\BaseController;

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

    #[Route('/login', name: "loginShowForm", methods: ["GET"])]
    public function loginForm()
    {
        self::isNotConnected();
        $this->render("Security/login.php",[],"Login","../public/css/security/login.css");
    }

    #[Route('/login',name:"login", methods:["POST"])]
    public function login()
    {
        self::isNotConnected();
        if(!empty($_POST)) {
            if(isset($_POST["login"], $_POST["password"]) && !empty($_POST["login"] && !empty($_POST["password"]))) {
                $login = strip_tags($_POST['login']);
                $password = strip_tags($_POST['password']);

                $connectionPdo = new UserManager(new PDO());
                $user = $connectionPdo->login($login,$password);


                $_SESSION["user"] = [
                    "id" => $user->getId(),
                    "lastname"=>$user->getLastname(),
                    "firstname"=>$user->getFirstname(),
                    "login"=>$user->getLogin(),
                    "role"=>$user->getRole(),
                ];
            }
        }
        header("Location: http://localhost:2711/", 301);
        exit;
    }
}