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
}