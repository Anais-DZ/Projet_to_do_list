<?php

//importer les fichiers que l'on vient de créer
    include './utils/functions.php';

//importe le model
    include './model/model_user.php';

    //déclarer nos variables d'affichage
    $messageConnexion = '';
    $title = 'Page de connexion';

// Je démarre ma $_SESSION pour pouvoir y accéder
    session_start();

//Vérifier si le formulaire est submit
    if(isset($_POST["submitConnexion"])) {

    //Vérifier que les données ne soient pas vides
        if(isset($_POST["email_user"]) && !empty($_POST["email_user"]) && isset( $_POST["mdp_user"]) && !empty($_POST["mdp_user"])) {

        //Vérifier le format de l'email
            if(filter_var($_POST["email_user"], FILTER_VALIDATE_EMAIL)) {

                //Nettoyer les données avec la fonction clean()
                $email = clean($_POST["email_user"]);
                $passwordConnexion = clean($_POST["mdp_user"]);

                //création de l'objet à la BDD
                $bdd = BDDconnect();

                //vérifier que l'utilisateur n'existe pas déjà dans la BDD par son mail en appelant la fonction
                $data = readUserByMail($bdd, $email);

                if(!empty($data)) {

                    //on appelle la fonction du model qui vérifie l'email en BDD
                    // $messageConnexion = readUserByMail($bdd, $email);

                    if (password_verify($passwordConnexion, $data[0]["mdp_user"])) {

                        // J'enregistre l'id_user, le name_user, le firstname_user et l'email_user dans la super-globale $_SESSION
                        $_SESSION["id"] = $data[0]["id_user"];
                        $_SESSION["name"] = $data[0]["name_user"];
                        $_SESSION["firstname"] = $data[0]["firstname_user"];
                        $_SESSION["email"] = $data[0]["email_user"];
                        // Redirection vers la page controller_compte
                        header("Location:controller_compte.php");
                        
                    } else {
                        $messageConnexion = "Login ou mot de passe incorrect3";
                    }

                } else {
                    $messageConnexion = "Login ou mot de passe incorrect4";
                }


            } else {
                //message d'erreur en cas de format d'email non valide
                $messageConnexion = "Login ou mot de passe incorrect4";
            }

        } else {
            //message d'erreur en cas de champs nom remplis
            $messageConnexion = "Veuillez remplir tous les champs !";
        }
    }

    //include des vues
    include './controller_header.php'; //mettre le controller_header au lieu du view header car le controller a déjà view
    include './view/view_connexion.php';
    include './view/footer.php';
?>