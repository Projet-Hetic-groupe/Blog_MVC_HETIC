<?php

namespace App\Controller;

use App\Base\BaseController;
use App\Model\Factory\PDO;
use App\Model\Route\Route;
use App\Model\Manager\PostManager;


class PostController extends BaseController
{
    #[Route('/add/post',name:"addPost", methods:["POST"])]
    public function addPost(){
        self::isConnected();

        if (!empty($_POST)) {
            if (isset($_POST["title"], $_POST["content"]) && !empty($_POST['title']) && !empty($_POST['content'])) {

                $title = strip_tags($_POST["title"]);
                $content = nl2br(strip_tags($_POST["content"]));
                $authorId = strip_tags($_SESSION["user"]["id"]);
                $image = NULL;
                $created_at = date('Y-m-d H:i:s');
                $updated_at = $created_at;


                $connectionPdo = new PostManager(new PDO());
                $connectionPdo->addPost($title,$content,$authorId,$image,$created_at,$updated_at);
            }
        }

        header("Location: http://localhost:2711/", 301);
        exit();
    }

    #[Route('/edit/post/{id}/{authorId}',name:"editPost", methods:["POST"])]
    public function editPost($id,$authorId)
    {
        self::isConnected();
        if (!empty($_POST)) {
            if (isset($_POST["title"], $_POST["content"]) && ($_SESSION["user"]["id"]==$authorId || $_SESSION["user"]["role"]=="admin") && !empty($_POST['title']) && !empty($_POST['content'])) {
                $title = strip_tags($_POST["title"]);
                $content = nl2br(strip_tags($_POST["content"]));
                $updated_at = date('Y-m-d H:i:s');

                $connectionPdo = new PostManager(new PDO());
                $connectionPdo->editPost($id,$title,$content,$updated_at);
            }
        }

        header("Location: http://localhost:2711/", 301);
        exit();
    }

    #[Route('/delete/post/{id}/{authorId}',name:"deletePost", methods:["POST"])]
    public function deletePost($id,$authorId)
    {
        self::isConnected();
            if (!empty($_POST)) {
                if (isset($_POST["delete"]) && !empty($_POST['delete']) && ($_POST['delete'] == "Supprimer") && ($_SESSION["user"]["id"]==$authorId || $_SESSION["user"]["role"]=="admin")) {

                    $connectionPdo = new PostManager(new PDO());
                    $connectionPdo->deletePost($id);
                }
            }
        header("Location: http://localhost:2711/", 301);
        exit();
    }

}