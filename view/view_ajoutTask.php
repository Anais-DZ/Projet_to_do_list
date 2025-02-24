<main>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Liste des tâches</h3>
                        <div>
                            <ul class="listTask">
                                <?= $tasksList ?>
                            </ul>
                            <form action="" method="post">
                                <div class="col-md-12">
                                    <label for="tache">Nouvelle tâche</label>
                                    <input id="tache" type="text" class="form-control" class="shadow-sm p-3 mb-5 bg-white rounded" name="name_task" placeholder="Entrer votre nouvelle tâche" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="description">Description de la tâche</label>
                                    <textarea id="description" class="form-control" class="shadow-sm p-3 mb-5 bg-white rounded" name="content_task" placeholder="Décriver la tâche" rows="2" required></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="date">Date de la tâche</label>
                                    <input id="date" type="date" class="form-control" class="shadow-sm p-3 mb-5 bg-white rounded" name="date_task" placeholder="Entrez la date" required>
                                </div>
                                <div class="form-button mt-3">
                                    <input class="btn btn-primary" type="submit" name="submitTask" value="Ajouter la tâche">
                                </div>
                            </form>
                            <p><?= $messageTask ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>