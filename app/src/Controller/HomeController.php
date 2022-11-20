<?php

namespace App\Controller;

use App\Base\BaseController;
use App\Model\Route\Route;


class HomeController extends BaseController
{
    #[Route('/',name:"homepage",methods:["GET"])]
    public function homepage()
    {
        $posts= ["hello","World"];

        $this->render("homepage.php", [
            "posts" => $posts,
        ], "Accueil");
    }
}