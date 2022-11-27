<?php

namespace App\Controller;

use App\Model\Route\Route;
use App\Base\BaseController;
use App\Model\Factory\PDO;
use App\Model\Manager\PostManager;
use App\Model\Manager\CommentManager;

final class HomeController extends BaseController
{
    #[Route('/', name: "homepage", methods: ["GET"])]
    public function homepage()
    {
        $connexionPost = new PostManager(new PDO());
        $posts = $connexionPost->getAllPosts();

        $connexionPost = new CommentManager(new PDO());
        $comments = $connexionPost->getAllComments();

        $this->render("homepage.php", [
            "comments"=>$comments,
            "posts" => $posts,
        ], "Accueil");
    }
}
