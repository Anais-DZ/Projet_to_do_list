<main>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Connexion</h3>
                        <div>
                            <form action="" method="post">
                                <div class="col-md-12">
                                    <label for="mail">Votre adresse mail</label>
                                    <input id="mail" type="email" class="form-control" class="shadow-sm p-3 mb-5 bg-white rounded" name="email_user" placeholder="Entrez votre email" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="mdp">Votre mot de passe</label>
                                    <input id="mdp" type="password" class="form-control" class="shadow-sm p-3 mb-5 bg-white rounded" name="mdp_user" placeholder="Entrez votre mot de passe" required>
                                </div>
                                <div class="form-button mt-3">
                                    <input class="btn btn-primary" type="submit" name="submitConnexion" value="Se connecter">
                                </div>
                            </form>
                            <p><?= $messageConnexion ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>