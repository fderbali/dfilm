<?php
require_once("includes/header.php");
require_once("../includes/films.php");
require_once("../includes/categories.php");
$id_categorie_to_edit = $_GET["id"];
$erreur = $message = "";
try {
    $film = new film(["id" => $id_categorie_to_edit]);
    $film->loadFromBd();
    $film_categories = $film->load_categories();
    $categorie = new categorie([]);
    $liste_categories = $categorie->getCategorieList();
} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Catégories associées</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Catégories associées à un film</li>
            </ol>
        </div>
        <div class="container-fluid">
            <form action="add_film_categories.php" method="POST">
                <?php foreach ($liste_categories as $indice => $categorie) {
                    $checked = "";
                    if (in_array($categorie->id, $film_categories)) {
                        $checked = "checked";
                    }
                    if ($indice % 2 == 0) {
                        echo '<div class="row">';
                    }
                    echo "
                    <div class='form-check col-md-6 pl-5'>
                        <input class='form-check-input' type='checkbox' value='$categorie->id' name='categories[]' id='categ$categorie->id' $checked>
                        <label class='form-check-label' for='categ$categorie->id'>
                            $categorie->nom
                        </label>
                    </div>";
                    if ($indice % 2 == 1) {
                        echo '</div>';
                    }
                } ?>
                <div class="row mt-5">
                    <input type="hidden" name="id" value="<?php echo $film->id ?>" />
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                    <br><br>
                </div>
            </form>
        </div>
    </main>
    <?php require_once("includes/footer.php"); ?>