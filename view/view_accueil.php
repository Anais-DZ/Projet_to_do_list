<main>
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
                            <p><?= $message ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>