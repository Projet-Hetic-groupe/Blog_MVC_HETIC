<?php

namespace App\Base;

abstract class BaseController
{
    /**
     * @param string $view
     * @param array $args
     * @param string $title
     * @return false|string
     */
    public function render(string $view, array $args = [], ?string $title = "Default")
    {
        //View principale (view identique a chaque url)
        $base = dirname(__DIR__, 2) . '/Views/baseView.php';
        //View additionel (view  différente en fonction des url)
        $view = dirname(__DIR__, 2) . '/Views/' . $view;

        // Temporisation de sortie (rien n'est envoyer au navigateur)
        ob_start();
        // Création de variable avec le nom de la valeur
        foreach ($args as $key => $value) {
            ${$key} = $value;
        }

        // Destruction de l'array args (inutile maintenantn que on a toutes nos variables)
        unset($args);
        require_once $view;

        // Injection de toutes les données dans la variable $_pageContent et vide le contenue du tampon
        $_pageContent = ob_get_clean();

        //Injection de titre de la page
        $_pageTitle = $title;

        require_once $base;
        // La base reste la même a chaque url mais la view change !
    }
}
