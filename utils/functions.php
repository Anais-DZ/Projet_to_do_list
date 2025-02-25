<?php
    //fonction pour nettoyer les données
    function clean($data) {
        return htmlentities(strip_tags(stripslashes(trim($data))));
    }

    function BDDconnect(){
        //Création de l'objet de connexion à la BDD
        $bdd = new PDO('mysql:hots=localhost;dbname=task', 'anais', 'anaisdiez28', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        return $bdd;
    }
?>