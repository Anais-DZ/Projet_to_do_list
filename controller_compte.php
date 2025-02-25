<?php
    // Je démarre ma $_SESSION  pour pouvoir y accéder
session_start();

// Je définie mes variables d'affichage
$name = "";
$firstname = "";
$email = "";

// Je vérifie qu'il existe une session
if(isset($_SESSION["id"]) && !empty($_SESSION["id"])) {

    //Je remplis les variables d'affichage (nom, prenom, email) avec le contenu de la Session
    $name = $_SESSION["name"];
    $firstname = $_SESSION["firstname"];
    $email = $_SESSION["email"];
    
}

    //include des vues
    include './controller_header.php';
    include './view/view_compte.php';
    include './view/footer.php';
?>