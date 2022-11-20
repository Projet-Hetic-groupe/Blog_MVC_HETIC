<?php

use App\Model\Route\Route;

require_once 'vendor/autoload.php';

// On le path du dossier Controller
$controllerDir = dirname(__FILE__) . '/src/Controller';
// On détecte tous les fichiers
$dirs = scandir($controllerDir);
// Pourquoi on a des . et .. alors que visuellement ils ne sont pas la
$controllers = [];

// On vire ne prends pas en compte les fichier . ..
foreach ($dirs as $dir) {
    if ($dir === "." || $dir === "..") {
        continue;
    }
    $controllers[] = "App\\Controller\\" . pathinfo($controllerDir . DIRECTORY_SEPARATOR . $dir)['filename'];

}
// On a dans notre array controllers le chemins de chaque controller


$routesObj = [];

//On veut instancier chaque route et les associer au controller

foreach ($controllers as $controller) {

    // Question prof détails ReflectionClass
    $reflection = new ReflectionClass($controller);

    // Pour chaque controller on détecte chaque méthode
    foreach ($reflection->getMethods() as $method) {

        foreach ($method->getAttributes() as $attribute) {
            // ON détecte le nombre d'attribute
            /** @var Route $route */
            // On instancie les route a l'aide des attributs ( 3 attributs = 3 routes)
            $route = $attribute->newInstance();
            //ON associe le controller et la route
            $route->setController($controller)
                // On attribut le nom de la méthode (d'ou l'importance de mettre l'attribut route juste au dessus de notre method pour pas associer la route a une autre méthod)
                ->setAction($method->getName());
            // On push chaque route dans notre tableau
            $routesObj[] = $route;
        }
    }
}
// Dans notre URL on prends uniqement le / (le premier);
// $_SERVER['REQUEST_URI'][0];

// ------------------

// Ne comprends pas ça car pas de ?
// explode("?",$_SERVER['REQUEST_URI'][0])

// on veut supprimer dans tout les cas le dernier / hors la fonction trim supprime le premier du coups on le rajoute manuellement
$url = "/" . trim(explode("?", $_SERVER['REQUEST_URI'])[0], "/");

foreach ($routesObj as $route) {
    if (!$route->match($url) || !in_array($_SERVER['REQUEST_METHOD'], $route->getMethods())) {
        continue;
    }

    // Ré explication du des 3 dernières lignes
    $controlerClassName = $route->getController();
    $action = $route->getAction();
    $params = $route->mergeParams($url);

    // Que fait le new $controller Classname
    echo [new $controlerClassName, $action](...$params);
    exit();
}

echo "NO MATCH";

die;
