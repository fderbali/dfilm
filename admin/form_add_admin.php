<?php
require_once("includes/header.php");
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Ajouter un administrateur</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Ajouter un administrateur</li>
            </ol>
        </div>
        <div class="container-fluid">
            <form action="add_admin.php" method="POST" class="px-5">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="realisateur">prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="date">Date de naissance</label>
                        <input type="text" class="form-control" id="date" name="date_de_naissance" placeholder="Date de naissance">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pochette">courriel</label>
                        <input type="text" class="form-control" id="courriel" name="courriel" placeholder="Courriel">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-check pt-4">
                            <input class="form-check-input" type="radio" name="sexe" value="M" id="masculin">
                            <label class="form-check-label" for="masculin">
                                Homme
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check pt-4">
                            <input class="form-check-input" type="radio" name="sexe" value="F" id="feminin">
                            <label class="form-check-label" for="feminin">
                                Femme
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="date">Mot de passe </label>
                        <input type="password" class="form-control" id="date" name="mot_de_passe" placeholder="Mot de passe">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pochette">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" id="confirm_mot_de_passe" name="confirm_mot_de_passe" placeholder="Confirmer le mot de passe ">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </form>
        </div>
    </main>
    <?php require_once("includes/footer.php"); ?>