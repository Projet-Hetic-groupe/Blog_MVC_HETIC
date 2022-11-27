<?php

namespace App\Controller;

use App\Model\Route\Route;
use App\Base\BaseController;
use App\Model\Factory\PDO;
use App\Model\Manager\PostManager;
use App\Model\Manager\CommentManager;
use App\Model\Manager\AnswerManager;

final class HomeController extends BaseController
{
    #[Route('/', name: "homepage", methods: ["GET"])]
    public function homepage()
    {
        $connexionPost = new PostManager(new PDO());
        $posts = $connexionPost->getAllPosts();

        $connexionComment = new CommentManager(new PDO());
        $comments = $connexionComment->getAllComments();

//        $connexionAnswer = new AnswerManager(new PDO());
//        $answer = $connexionAnswer->getAllAnswer();

        $this->render("homepage.php", [
            "comments"=>$comments,
//            "answers"=>$answer,
            "posts" => $posts,
        ], "Accueil");
    }
}
