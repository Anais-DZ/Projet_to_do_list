<?php

// Je démarre ma session pour pouvoir y accéder et pour que le header se modifie (mettre sur tout les controllers)
    session_start();

    //déclaration de la variable d'affichage du header
    $liens = "";

    if(isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
        $liens = '<a href="./controller_compte.php">Mon compte</a>
        <a href="./controller_deco.php">Déconnexion</a>';

    } else {
        $liens = '<a href="./controller_connexion.php">Connexion</a>';
    }

    //include des vues
    include './view/header.php';

    //! Ne fonctionne pas donc condition directement mise dans header.php

?>