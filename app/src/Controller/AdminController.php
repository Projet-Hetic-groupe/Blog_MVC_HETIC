<?php

namespace App\Controller;

use App\Base\BaseController;
use App\Model\Factory\PDO;
use App\Model\Manager\AdminManager;
use App\Model\Manager\UserManager;
use App\Model\Route\Route;

class AdminController extends BaseController
{
    #[Route('/admin/dashboard', name: "admin.dashboard", methods: ["GET"])]
    public function dashboard()
    {
        self::isConnected();
        self::isAdmin();

        $connectionPdo = new AdminManager(new PDO());
        $users = $connectionPdo->getAllUsers();

        $this->render("/admin/dashboard.php", [
            "users" => $users,
        ], "Admin Dashboard", "../public/css/admin/dashboard.css");
    }

    #[ROUTE('/admin/add/user', name: "admin.addUser", methods: ["POST"])]
    public function addUser()
    {
        self::isConnected();
        self::isAdmin();

        if (!empty($_POST)) {
            if (isset($_POST["lastname"], $_POST["firstname"], $_POST["login"], $_POST['password'], $_POST["role"]) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST["role"])) {

                // Hash password
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $lastname = strip_tags($_POST['lastname']);
                $firstname = strip_tags($_POST['firstname']);
                $login = strip_tags($_POST['login']);
                $role = strip_tags($_POST['role']);

                $connectionPdo = new AdminManager(new PDO());
                $connectionPdo->addUser($lastname, $firstname, $login, $password, $role);
            }
        }
        header("Location: http://localhost:2711/admin/dashboard", 301);
        exit();
    }

    #[Route('/admin/edit/user/{id}', name: "admin.editUser", methods: ["POST"])]
    public function editUser($id)
    {
        self::isConnected();
        self::isAdmin();
        if (!empty($_POST)) {
            if (isset($_POST["lastname"], $_POST["firstname"], $_POST["login"], $_POST["role"]) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['login']) && !empty($_POST["role"])) {
                $lastname = strip_tags($_POST['lastname']);
                $firstname = strip_tags($_POST['firstname']);
                $login = strip_tags($_POST['login']);
                $role = strip_tags($_POST['role']);

                $connectionPdo = new AdminManager(new PDO());
                $connectionPdo->editUser($id, $lastname, $firstname, $login, $role);
            }
        }


        header("Location: http://localhost:2711/admin/dashboard", 301);
        exit();
    }


    /**
     * @param $id
     * @return void
     */
    #[ROUTE('/admin/delete/user/{id}', name: "admin.deleteUser", methods: ["POST"])]
    public function deleteUser($id)
    {
        self::isConnected();
        self::isAdmin();

        if (!empty($_POST)) {
            if (isset($_POST["delete"]) && !empty($_POST['delete']) && ($_POST['delete'] == "Supprimer") && ($_SESSION['user']["id"] != $id )) {

                $connectionPdo = new AdminManager(new PDO());
                $connectionPdo->deleteUser($id);
            }
        }
        header("Location: http://localhost:2711/admin/dashboard", 301);
        exit();

    }
}