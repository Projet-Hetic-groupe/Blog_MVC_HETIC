<?php

namespace App\Controller;

use App\Base\BaseController;
use App\Model\Factory\PDO;
use App\Model\Manager\CommentManager;
use App\Model\Route\Route;

class CommentController extends BaseController
{
    #[Route('/add/comment/{post_Id}', name:'addComment',methods:["POST"])]
    public function addComment($post_Id){
        self::isConnected();
        if (!empty($_POST)) {
            if (isset($_POST["content"]) && !empty($_POST['content'])) {

                $content = nl2br(strip_tags($_POST["content"]));
                $authorId = $_SESSION["user"]["id"];
                $postId = $post_Id;
                $created_at = date('Y-m-d H:i:s');
                $updated_at = $created_at;


                $connectionPdo = new CommentManager(new PDO());
                $connectionPdo->addComment($content,$authorId,$postId,$created_at,$updated_at);
            }
        }

        header("Location: http://localhost:2711/", 301);
        exit();
    }


    #[Route('/edit/comment/{id}/{authorId}',name:'editComment',methods:["POST"])]
    public function editComment($id,$authorId)
    {
        self::isConnected();
        if (!empty($_POST)) {
            if (isset($_POST["content"]) && !empty($_POST['content']) && ($_SESSION["user"]["id"]==$authorId || $_SESSION["user"]["role"]=="admin")) {

                $content = nl2br(strip_tags($_POST["content"]));
                $updated_at = date('Y-m-d H:i:s');

                $connectionPdo = new CommentManager(new PDO());
                $connectionPdo->editComment($id,$content,$updated_at);
            }
        }

        header("Location: http://localhost:2711/", 301);
        exit();
    }


    #[Route('/delete/comment/{id}/{authorId}', name:'deletePost', methods:["POST"])]
    public function deleteComment($id,$authorId)
    {
        self::isConnected();
        if (!empty($_POST)) {
            if (isset($_POST["delete"]) && !empty($_POST['delete']) && ($_POST['delete'] == "Supprimer") && ($_SESSION["user"]["id"]==$authorId || $_SESSION["user"]["role"]=="admin")) {

                $connectionPdo = new CommentManager(new PDO());
                $connectionPdo->deleteComment($id);
            }
        }
        header("Location: http://localhost:2711/", 301);
        exit();
    }
}