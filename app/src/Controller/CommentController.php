<?php

namespace App\Controller;

use App\Base\BaseController;
use App\Model\Manager\CommentManager;
use App\Model\Route\Route;
use App\Model\Factory\PDO;

class CommentController extends BaseController
{
    #[Route('admin/comment', name: "comment", methods: ["GET"])]
    public function commentPage()
    {
        $connexionPost = new CommentManager(new PDO());
        $comments = $connexionPost->getAllComments();


        $this->render("admin/comment.php", [
            "comments" => $comments,
        ], "Accueil");
    }

    #[ROUTE('/admin/add/comment', name: "admin.addComment", methods: ["POST"])]
    public function addComment()
    {
        
        if (!empty($_POST)) {
            if (isset($_POST["content"], $_POST["authorId"], $_POST["postId"]) && !empty($_POST['content']) && !empty($_POST['authorId'])  && !empty($_POST["postId"])) {
                $content = strip_tags($_POST['content']);
                $authorId = strip_tags($_POST['authorId']);
                $created_at = date('Y-m-d H:i:s');
                $updated_at = $created_at;
                $postId = strip_tags($_POST['postId']);
                $connectionPdo = new CommentManager(new PDO());
                $connectionPdo->addComment($content, $authorId, $created_at, $updated_at, $postId);
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