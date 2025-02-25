<?php

// Je démarre ma session pour pouvoir y accéder
session_start();

// Je détruis ma session : j'efface ce que j'avais enregistré dans $_SESSION
session_destroy();

// Redirection vers la page 1
header("Location:controller_accueil.php");

?>