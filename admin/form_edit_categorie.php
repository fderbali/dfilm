<?php
require_once("includes/header.php");
require_once("../includes/categories.php");
$id_categorie_to_edit = $_GET["id"];
$erreur = $message = "";
try {
    $categorie = new categorie(["id" => $id_categorie_to_edit]);
    $categorie->loadFromBd();
} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Éditer une catégorie</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Éditer une catégorie</li>
            </ol>
        </div>
        <div class="container-fluid">
            <form action="add_categorie.php" method="POST" class="px-5">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nom">Nom</label>
                        <input type="hidden" name="id" value="<?php echo $categorie->id ?>" />
                        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $categorie->nom ?>" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </form>
        </div>
    </main>
    <?php require_once("includes/footer.php"); ?>