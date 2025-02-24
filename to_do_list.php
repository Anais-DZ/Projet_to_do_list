<?php

    //déclaration de la variable message
    $message = "";
    $usersList = "";

    //déclaration des variables pour l'inscription
    $name = "";
    $firstname = "";
    $email = "";
    $password = "";
    $password2 = "";

    //fonction pour nettoyer les données
    function clean($data) {
        return htmlentities(strip_tags(stripslashes(trim($data))));
    }

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


                    //Communication avec la BDD

                    //Création de l'objet de connexion à la BDD
                    $bdd = new PDO('mysql:hots=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

                    try {
                        //envoi de requête pour savoir si l'adresse mail existe déjà
                        //preparation de la réquête SELECT
                        $req = $bdd->prepare("SELECT email_user FROM users WHERE email_user = ? LIMIT 1 ");

                        //binding du paramètre email pour remplacer le "?"
                        $req->bindParam(1, $email, PDO::PARAM_STR);

                        //exécuter la requête avec execute()
                        $req->execute();

                        //récupérer la réponse de la BDD
                        $data = $req->fetchAll();

                        if(empty($data)) {

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
                            $message = "L'enregistrement de $firstname $name (email : $email) a été effectuté avec succès.";

                        } else {
                            $message = "Le mail existe déjà.";
                        }

                    } catch(EXCEPTION $error) {
                        //en cas de problème, je récupère le message d'erreur et je l'affiche
                        $message = $error->getMessage();
                    }


                } else {
                    //message d'erreur en cas de mots de passe non identiques
                    $message = "Les deux mots de passe ne sont pas identiques";
                }

            } else {
                //message d'erreur en cas d'adresse mail non valide
                $message = "L'adresse mail n'est pas au bon format";
            }

        } else {
            //message d'erreur en cas de champs nom remplis
            $message = "Veuillez remplir tous les champs !";
        }
    }

    //question 4 
                    // Création de l'objet de connexion à la BDD
                    $bdd = new PDO('mysql:hots=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

                    try {
                        //préparer la requête SELECT
                        $req = $bdd->prepare('SELECT firstname_user, name_user, email_user FROM users');

                        //exécute la requête
                        $req->execute();

                        //récupère les données de la BDD
                        $data = $req->fetchAll();

                        //on affiche les données du tableau dans une liste ou autre (au choix)
                        foreach ($data as $users) {
                            $usersList = $usersList."<li>{$users['firstname_user']} {$users['name_user']} - {$users['email_user']}</li>";
                        }

                    }catch(EXCEPTION $error) {
                        $usersList = $error->getMessage();
                    }
            
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>TP task</title>
</head>
<body style="display: flex; flex-direction: column; align-items: center;">
    <h1>TO DO LIST</h1>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Inscription</h3>
                    <div>
                        <form action="" method="post">
                            <div class="col-md-12">
                                <label for="nom">Votre nom</label>
                                <input id="nom" type="text" class="form-control" class="shadow-sm p-3 mb-5 bg-white rounded" name="name_user" placeholder="Entrez votre nom" required>
                            </div>
                            <div class="col-md-12">
                                <label for="prenom">Votre prénom</label>
                                <input id="prenom" type="text" class="form-control" class="shadow-sm p-3 mb-5 bg-white rounded" name="firstname_user" placeholder="Entrez votre prénom" required>
                            </div>
                            <div class="col-md-12">
                                <label for="mail">Votre adresse mail</label>
                                <input id="mail" type="email" class="form-control" class="shadow-sm p-3 mb-5 bg-white rounded" name="email_user" placeholder="Entrez votre email" required>
                            </div>
                            <div class="col-md-12">
                                <label for="mdp">Votre mot de passe</label>
                                <input id="mdp" type="password" class="form-control" class="shadow-sm p-3 mb-5 bg-white rounded" name="mdp_user" placeholder="Entrez votre mot de passe" required>
                            </div>
                            <div class="col-md-12">
                                <label for="mdp2">Confirmez votre mot de passe</label>
                                <input id="mdp2" type="password" class="form-control" class="shadow-sm p-3 mb-5 bg-white rounded" name="mdp_user_confirmation" placeholder="Entrez à nouveau votre mot de passe" required>
                            </div>
                            <div class="form-button mt-3">
                                <input class="btn btn-primary" type="submit" name="submit" value="S'inscrire">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p><?=$message?></p>
    <h2>Liste des utilisateurs</h2>
    <ul>
        <?=$usersList?>
    </ul>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>