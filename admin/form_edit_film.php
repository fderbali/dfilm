<?php
require_once("includes/header.php");
require_once("../includes/films.php");
$id_categorie_to_edit = $_GET["id"];
$erreur = $message = "";
try {
    $film = new film(["id" => $id_categorie_to_edit]);
    $film->loadFromBd();
    list($hour, $minutes) = explode(":", $film->duree);
    $duree_film_in_munites = $hour * 60 + $minutes;
} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Éditer un film</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Éditer un film</li>
            </ol>
        </div>
        <div class="container-fluid">
            <form action="add_film.php" method="POST" enctype="multipart/form-data" class="px-5 mb-5">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $film->nom ?> ">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="realisateur">Réalisateur</label>
                        <input type="text" class="form-control" id="realisateur" name="realisateur" value="<?php echo $film->realisateur ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="duree">Durée</label> <br />
                        &nbsp;&nbsp;<input id="duree" name="duree" class="form-control" data-slider-id='dureeFilmSlider' type="text" data-slider-min="10" data-slider-max="300" data-slider-step="1" data-slider-value="<?php echo $duree_film_in_munites ?>" />
                        &nbsp;&nbsp;<span id="labelDureeFilm"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="langue">Langue</label>
                        <select class="form-control" name="langue" id="langue">
                            <option value="">Sélectionnez...</option>
                            <option value="fr" <?php echo ($film->langue == "fr" ? "selected" : "") ?>>Français</option>
                            <option value="en" <?php echo ($film->langue == "en" ? "selected" : "") ?>>Anglais</option>
                            <option value="es" <?php echo ($film->langue == "es" ? "selected" : "") ?>>Espagnol</option>
                            <option value="it" <?php echo ($film->langue == "it" ? "selected" : "") ?>>Italien</option>
                            <option value="de" <?php echo ($film->langue == "de" ? "selected" : "") ?>>Allemand</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="date">Date de sortie</label>
                        <input type="text" class="form-control" id="date" name="date" value="<?php echo $film->date ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pochette">Pochette</label>
                        <input type="file" class="form-control" id="pochette" name="pochette">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="url_bande_annonce">Bande Annonce</label>
                        <input type="text" class="form-control" id="url_bande_annonce" name="url_bande_annonce" value="<?php echo $film->url_bande_annonce ?>">
                    </div>
                    <div class="col-md-1 form-group">
                        <label for="url_bande_annonce">&nbsp;</label><br>
                        <a class="btn btn-info" target="_blank" href="<?php echo $film->url_bande_annonce ?>">Voir&nbsp;&nbsp;<i class='fas fa-external-link-alt'></i></a>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pochette_grand_format">Pochette grand format</label>
                        <input type="file" class="form-control" id="pochette_grand_format" name="pochette_grand_format">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="prix">Prix</label>
                        <input type="text" class="form-control" value="<?php echo $film->prix ?>" id="prix" name="prix" placeholder="Prix">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pochette_grand_format">Définition</label>
                        <input class="form-control" value="<?php echo $film->definition ?>" id="definition" name="definition" placeholder="Définition">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="prix">Score TMDB <a target="_blank" href="https://www.themoviedb.org/"><i class='fas fa-external-link-alt'></i></a></label>
                        <input type="text" class="form-control" value="<?php echo $film->score ?>" id="score" name="score" placeholder="Score TMDB">
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check pt-4">
                            <input class="form-check-input" type="checkbox" name="en_vedette" id="en_vedette" <?php echo ($film->en_vedette > 0 ? "checked" : "") ?>>
                            <label class="form-check-label" for="en_vedette">
                                Film en vedette
                            </label>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?php echo $film->id ?>" />
                <a href="liste_films.php" class="btn btn-success"><i class="fas fa-arrow-left"></i>&nbsp;Retour</a>
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </form>
        </div>
    </main>
    <?php require_once("includes/footer.php"); ?>