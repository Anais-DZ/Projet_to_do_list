<?php
    //importer les fichiers que l'on vient de créer
    include './utils/functions.php';

    //importe le model
    include './model/model_user.php';

    //variable d'affichage
    $usersList = "";
    $title = 'Afficher les utilisateurs';
    $bdd = BDDconnect();

    //j'appelle la fonction qui récupère tous les utilisateurs
    $data = userAll($bdd);

    foreach ($data as $user) {
        $usersList = $usersList."<li>{$user['firstname_user']} {$user['name_user']} - {$user['email_user']}</li>";
    }

    //include des vues
    include './view/header.php';
    include './view/view_userAll.php';
    include './view/footer.php';
?>