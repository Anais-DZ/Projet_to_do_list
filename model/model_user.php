<?php
//le model contient les fonctions qui communiquent avec la BDD

    //userAdd() : je crée la fonction qui me permettra d'ajouter un nouvel article en BDD
    function userAdd($bdd, $name, $firstname, $email, $password) {
        try {
            //envoi de requête pour savoir si l'adresse mail existe déjà
            //envoi de requête SQL avec la méthode prepare()
            $req = $bdd->prepare("INSERT INTO users(`name_user`, `firstname_user`, `email_user`, `mdp_user`) VALUES (?, ?, ?, ?)");

            //binding des paramètres pour remplacer les "?"
            $req->bindParam(1, $name, PDO::PARAM_STR);
            $req->bindParam(2, $firstname, PDO::PARAM_STR);
            $req->bindParam(3, $email, PDO::PARAM_STR);
            $req->bindParam(4, $password, PDO::PARAM_STR);

            //exécuter la requête avec execute()
            $req->execute();

            //message de confirmation
            return "L'enregistrement de $firstname $name (email : $email) a été effectué avec succès.";

        } catch(EXCEPTION $error) {
            //en cas de problème, je récupère le message d'erreur et je l'affiche
            return $error->getMessage();
        }

    }


    //fonction qui récupère un utilisateur par son mail
    function readUserByMail($bdd, $email) {
        try {

            //préparer la requête
            $req = $bdd->prepare("SELECT email_user FROM users WHERE email_user = ? LIMIT 1 ");

            $req->bindParam(1, $email, PDO::PARAM_STR);

            $req->execute();

            $data = $req->fetchAll();

            return $data;
        
        } catch(EXCEPTION $error) {
            return $error->getMessage();
        }
    }


    function userAll($bdd) {
        try {
            //préparer la requête SELECT
            $req = $bdd->prepare('SELECT firstname_user, name_user, email_user FROM users');

            //exécute la requête
            $req->execute();

            //récupère les données de la BDD
            $data = $req->fetchAll();

            return $data;

        }catch(EXCEPTION $error) {
            return $error->getMessage();
        }

    }

?>