<?php
require_once("includes/header.php");
require_once("../includes/films.php");
if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $current_film = new film(["id" => $id]);
    $current_film->loadFromBd();
}
$nom = $_POST["nom"];
$realisateur = $_POST["realisateur"];
$duree = date('H:i', mktime(0, $_POST["duree"]));
$langue = $_POST["langue"];
$date = $_POST["date"];
$en_vedette = (isset($_POST["en_vedette"]) == "on" ? 1 : 0);
$prix = $_POST["prix"];
$definition = $_POST["definition"];
$score = $_POST["score"];
$nomPochette = sha1($nom . time());
$nomPochetteGrandFormat = sha1($nom . (time() + 1));
$dossierPochettes = "../assets/images/pochettes/";
$dossierPochettesFilmsEnVedette = "../assets/images/pochettes/pochettesGrandFormat/";
$url_bande_annonce = $_POST["url_bande_annonce"];
$erreur = $message = "";
try {
    // Enregregistrement des pochettes :
    if ($_FILES['pochette']['tmp_name'] !== "") {
        //Upload de la photo
        $tmp = $_FILES['pochette']['tmp_name'];
        $fichier = $_FILES['pochette']['name'];
        $extension = strrchr($fichier, '.');
        @move_uploaded_file($tmp, $dossierPochettes . $nomPochette . $extension);
        // Enlever le fichier temporaire chargé
        @unlink($tmp); //effacer le fichier temporaire
        $pochette = $nomPochette . $extension;
    }
    if ($_FILES['pochette_grand_format']['tmp_name'] !== "") {
        //Upload de la photo
        $tmp = $_FILES['pochette_grand_format']['tmp_name'];
        $fichier = $_FILES['pochette_grand_format']['name'];
        $extension = strrchr($fichier, '.');
        @move_uploaded_file($tmp, $dossierPochettesFilmsEnVedette . $nomPochetteGrandFormat . $extension);
        // Enlever le fichier temporaire chargé
        @unlink($tmp); //effacer le fichier temporaire
        $pochette_grand_format = $nomPochetteGrandFormat . $extension;
    }

    $film = new film([
        "id" => (isset($id) ? $id : 0),
        "nom" => $nom,
        "realisateur" => $realisateur,
        "duree" => $duree,
        "langue" => $langue,
        "date" => $date,
        "pochette" => (isset($pochette) ? $pochette : $current_film->pochette),
        "en_vedette" => $en_vedette,
        "pochette_grand_format" => (isset($pochette_grand_format) ? $pochette_grand_format : (isset($current_film->pochette_grand_format) ? $current_film->pochette_grand_format : "")),
        "url_bande_annonce" => $url_bande_annonce,
        "prix" => $prix,
        "score" => $score,
        "definition" => $definition,
    ]);
    $inserted_id = $film->save();
    if ($inserted_id) {
        $message = "Film enregistré avec succès !";
    } else {
        $erreur = "Le film n'a pas pu être enregistré !";
    }
} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Ajouter/éditer film</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Ajouter/éditer film</li>
            </ol>
        </div>
        <div class="container-fluid">
            <?php if ($erreur) : ?>
                <div class="alert alert-danger">
                    <?php echo $erreur ?>
                </div>
            <?php else : ?>
                <div class="alert alert-success">
                    <?php echo $message ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="container-fluid">
            <a href="liste_films.php" class="btn btn-success"><i class="fas fa-arrow-left"></i>&nbsp;Retour</a>
            <a href="film_categories.php?id=<?php echo $inserted_id ?>" class="btn btn-primary"><i class='fas fa-grip-horizontal'></i>&nbsp;Catégories</a>
        </div>
    </main>

    <?php require_once("includes/footer.php"); ?>