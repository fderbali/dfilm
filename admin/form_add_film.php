<?php
require_once("includes/header.php");
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Ajouter un film</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Ajouter un film</li>
            </ol>
        </div>
        <div class="container-fluid">
            <form action="add_film.php" method="POST" enctype="multipart/form-data" class="px-5">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom du film">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="realisateur">Réalisateur</label>
                        <input type="text" class="form-control" id="realisateur" name="realisateur" placeholder="Réalisateur">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="duree">Durée</label> <br />
                        &nbsp;&nbsp;<input id="duree" name="duree" class="form-control" data-slider-id='dureeFilmSlider' type="text" data-slider-min="10" data-slider-max="300" data-slider-step="1" data-slider-value="10" />
                        &nbsp;&nbsp;<span id="labelDureeFilm"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="langue">Langue</label>
                        <select class="form-control" name="langue" id="langue">
                            <option value="">Sélectionnez...</option>
                            <option value="fr">Français</option>
                            <option value="en">Anglais</option>
                            <option value="es">Espagnol</option>
                            <option value="it">Italien</option>
                            <option value="de">Allemand</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="date">Date de sortie</label>
                        <input type="text" class="form-control" id="date" name="date" placeholder="Date de sortie">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pochette">Pochette</label>
                        <input type="file" class="form-control" id="pochette" name="pochette" placeholder="Pochette">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="url_bande_annonce">Bande Annonce</label>
                        <input type="text" class="form-control" id="url_bande_annonce" name="url_bande_annonce" placeholder="Date de sortie">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pochette_grand_format">Pochette grand format</label>
                        <input type="file" class="form-control" id="pochette_grand_format" name="pochette_grand_format" placeholder="Pochette grand format">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="prix">Prix</label>
                        <input type="text" class="form-control" id="prix" name="prix" placeholder="Prix">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pochette_grand_format">Définition</label>
                        <input class="form-control" id="definition" name="definition" placeholder="Définition">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="prix">Score TMDB <a target="_blank" href="https://www.themoviedb.org/"><i class='fas fa-external-link-alt'></i></a></label>
                        <input type="text" class="form-control" id="score" name="score" placeholder="Score TMDB">
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check pt-4">
                            <input class="form-check-input" type="checkbox" name="en_vedette" id="en_vedette">
                            <label class="form-check-label" for="en_vedette">
                                Film en vedette
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </form>
        </div>
    </main>
    <?php require_once("includes/footer.php"); ?>