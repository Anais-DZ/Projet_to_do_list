<?php
    //importer les fichiers que l'on vient de créer
    include './utils/functions.php';

    //importe le model
    include './model/model_task.php';

    //déclarer nos variables d'affichage
    $messageTask = '';
    $tasksList = '';
    $title = 'Ajouter une nouvelle tâche';
    
    //Vérifier si le formulaire est submit
    if(isset($_POST["submitTask"])) {

        //Vérifier que les données ne soient pas vides
        if(isset($_POST["name_task"]) && !empty($_POST["name_task"])  && isset( $_POST["content_task"]) && !empty($_POST["content_task"]) && isset( $_POST["date_task"]) && !empty($_POST["date_task"])) {

            //Nettoyer les données avec la fonction clean()
            $tache = clean($_POST["name_task"]);
            $description = clean($_POST["content_task"]);
            $date = clean($_POST["date_task"]);

            //création de l'objet à la BDD
            $bdd = BDDconnect();

            //j'appelle la fonction qui récupère toutes les tâches
            $data = writteTask($bdd, $tache, $description, $date);

        } else {
            //message d'erreur en cas de champs nom remplis
            $messageTask = "Veuillez remplir tous les champs !";
        }

    }

    $bdd = BDDconnect();
    $data = afficherTask($bdd);

    foreach ($data as $task) {
        $tasksList = $tasksList."<li>{$task['name_task']} : {$task['content_task']} <h6>{$task['date_task']}</h6></li>";
    }

    include './view/header.php';
    include './view/view_ajoutTask.php';
    include './view/footer.php';
?>