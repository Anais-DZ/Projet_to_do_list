<?php
//pas besoin du session_start car déjà sur les autres

    //déclaration de la variable d'affichage du header
    $nav = '<a href="controller_connexion.php">Connexion</a>';

    if(isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
        $nav = '<a href="controller_compte.php">Mon compte</a>
        <a href="controller_deco.php">Déconnexion</a>';
    }

    //include des vues
    include './view/header.php';

?>