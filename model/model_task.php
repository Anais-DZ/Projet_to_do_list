<?php
function writteTask($bdd, $tache, $description, $date) {
    try {
        //envoi de requête SQL avec la méthode prepare()
        $req = $bdd->prepare("INSERT INTO tasks(`name_task`, `content_task`, `date_task`) VALUES (?, ?, ?)");

        $req->bindParam(1, $tache, PDO::PARAM_STR);
        $req->bindParam(2, $description, PDO::PARAM_STR);
        $req->bindParam(3, $date, PDO::PARAM_STR);

        //exécute la requête
        $req->execute();

        //message de confirmation
        return "L'ajout de '$tache' a été effectué avec succès.";

    } catch(EXCEPTION $error) {
        return $error->getMessage();
    }

}

//TODO écrire une fonction pour que l'utilisateur accède à sa to do list quand il se connecte

function afficherTaskUtilisateur($bdd, $id_user) {
    try {
        // Récupération des tâches de l'utilisateur connecté
        $req = $bdd->prepare("SELECT name_task, content_task, date_task FROM tasks WHERE id_user = ? ORDER BY date_task ");

        // Liaison du paramètre
        $req->bindParam(1, $id_user, PDO::PARAM_INT);

        // Exécution de la requête
        $req->execute();

        // Récupération des résultats
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        return $data; 

    } catch (EXCEPTION $error) { 
        return $error->getMessage();
    }
}


// function afficherTask ($bdd) {

//     try {
//     // Récupération de toutes les tâches après insertion 
//     $req = $bdd->prepare("SELECT name_task, content_task, date_task FROM tasks ORDER BY date_task");

//     //exécute la requête
//     $req->execute();

//     $data = $req->fetchAll();

//     return $data; 

//     } catch (EXCEPTION $error) { 
//         return $error->getMessage();
//     }
// }
?>