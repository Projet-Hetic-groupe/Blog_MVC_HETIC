<?php

namespace App\Controller;

use App\Model\Route\Route;
use App\Base\BaseController;
use App\Model\Factory\PDO;
use App\Model\Manager\PostManager;

final class HomeController extends BaseController
{
    #[Route('/', name: "homepage", methods: ["GET"])]
    public function homepage()
    {
        $connexionPost = new PostManager(new PDO());
        $posts = $connexionPost->getAllPosts();


        $this->render("homepage.php", [
            "posts" => $posts,
        ], "Accueil");
    }
}
