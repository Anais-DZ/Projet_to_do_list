<?php
    // Je démarre ma session pour pouvoir y accéder et pour que le header se modifie (mettre sur tout les controllers)
    session_start();

    //importer les fichiers que l'on vient de créer
    include './utils/functions.php';

    //importe le model
    include './model/model_user.php';

    //déclarer nos variables d'affichage
    $message = '';
    $title = 'Ajouter un nouvel utilisateur';

    //Vérifier si le formulaire est submit
    if(isset($_POST["submit"])) {

        //Vérifier que les données ne soient pas vides
        if(isset($_POST["name_user"]) && !empty($_POST["name_user"]) && isset( $_POST["firstname_user"]) && !empty($_POST["firstname_user"]) && isset( $_POST["email_user"]) && !empty($_POST["email_user"]) && isset( $_POST["mdp_user"]) && !empty($_POST["mdp_user"]) && isset($_POST["mdp_user_confirmation"]) && !empty($_POST["mdp_user_confirmation"])) {

            //Vérifier le format de l'email
            if(filter_var($_POST["email_user"], FILTER_VALIDATE_EMAIL)) {

                //Vérifier que les deux mots de passe sont identiques
                if(($_POST["mdp_user"]) == ($_POST["mdp_user_confirmation"])) {

                    //Nettoyer les données avec la fonction clean()
                    $name = clean($_POST["name_user"]);
                    $firstname = clean($_POST["firstname_user"]);
                    $email = clean($_POST["email_user"]);
                    $password = clean($_POST["mdp_user"]);

                    //hasher le mot de passe
                    $password = password_hash($password, PASSWORD_BCRYPT);

                    //création de l'objet à la BDD
                    $bdd = BDDconnect();

                    //vérifier que l'utilisateur n'existe pas déjà dans la BDD par son mail en appelant la fonction
                    $data = readUserByMail($bdd, $email);

                    if(empty($data)) {
                        
                        //on appelle la fonction du model qui ajoute un article en BDD
                        $message = userAdd($bdd, $name, $firstname, $email, $password);

                    } else {
                        $message = "Cet email est déjà utilisé par un autre compte.";
                    }

                } else {
                    //message d'erreur en cas de mots de passe non identiques
                    $message = "Les deux mots de passe ne sont pas identiques.";
                
                }

            } else {
                //message d'erreur en cas d'adresse mail non valide
                $message = "L'adresse mail n'est pas au bon format.";
            }

        } else {
            //message d'erreur en cas de champs nom remplis
            $message = "Veuillez remplir tous les champs !";
        }
    }



    //include des vues
    include './view/header.php';
    include './view/view_accueil.php';
    include './view/footer.php';
?>