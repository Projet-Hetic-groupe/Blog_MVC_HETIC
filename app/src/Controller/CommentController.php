<?php

namespace App\Controller;

use App\Base\BaseController;
use App\Model\Manager\CommentManager;
use App\Model\Route\Route;
use App\Model\Factory\PDO;

class CommentController extends BaseController
{
    #[Route('/', name: "homepage", methods: ["GET"])]
    public function homepage()
    {
        $connexionPost = new CommentManager(new PDO());
        $comments = $connexionPost->getAllComments();


        $this->render("homepage.php", [
            "comments" => $comments,
        ], "Accueil");
    }

    #[ROUTE('/admin/add/comment', name: "admin.addComment", methods: ["POST"])]
    public function addComment()
    {
        self::isConnected();
        self::isAdmin();

        if (!empty($_POST)) {
            if (isset($_POST["content"], $_POST["authorId"], $_POST["created_at"], $_POST['updated_at'], $_POST["postId"]) && !empty($_POST['content']) && !empty($_POST['authorId']) && !empty($_POST['created_at']) && !empty($_POST['updated_at']) && !empty($_POST["postId"])) {

                // Hash password
                //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $content = strip_tags($_POST['content']);
                $authorId = strip_tags($_POST['authorId']);
                $created_at = strip_tags($_POST['created_at']);
                $updated_at = strip_tags($_POST['updated_at']);
                $postId = strip_tags($_POST['postId']);
               

                $connectionPdo = new CommentManager(new PDO());
                $connectionPdo->addUser($content, $authorId, $created_at, $updated_at, $postId);
            }
        }
        header("Location: http://localhost:2711/admin/comment", 301);
        exit();
    }

/**
     * @param $id
     * @return void
     */
    #[ROUTE('/admin/delete/comment/{id}', name: "admin.deletecomment", methods: ["POST"])]
    public function deleteComment($id)
    {
        self::isConnected();
        self::isAdmin();

        if (!empty($_POST)) {
            if (isset($_POST["delete"]) && !empty($_POST['delete']) && ($_POST['delete'] == "Supprimer") && ($_SESSION['comment']["id"] != $id )) {

                $connectionPdo = new CommentManager(new PDO());
                $connectionPdo->deleteComments($id);
            }
        }
        header("Location: http://localhost:2711/admin/comment", 301);
        exit();

    }

}