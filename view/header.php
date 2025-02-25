<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="src/style/style.css">
    <title>TP task</title>
</head>
<body style="display: flex; flex-direction: column; align-items: center;">
    <header>
        <h1>TO DO LIST</h1>
        <nav style="justify-self: center;">
            <a href="controller_accueil.php">Accueil</a>

            <?php if (!isset($_SESSION["id"])) : ?>
                
                <a href="controller_connexion.php">Connexion</a>

            <?php else : ?>

            <a href="controller_task.php">Ma liste</a>   
            <a href="controller_compte.php">Mon compte</a>
            <a href="controller_deco.php">Déconnexion</a>

            <?php endif; ?>

            <!-- condition qui devrait être mis dans controller_header mais $liens ne fonctionne pas -->
        </nav>
    </header>
