<?php
require_once("includes/header.php");
require_once("../includes/membre.php");
if (isset($_POST["id"])) {
    $id = $_POST["id"];
}
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$courriel = $_POST["courriel"];
$sexe = $_POST["sexe"];
$date_de_naissance = $_POST["date_de_naissance"];
$password = $_POST["mot_de_passe"];
$confirm_mot_de_passe = $_POST["confirm_mot_de_passe"];
$erreur = $message = "";

try {
    $membre = new membre([
        "id" => (isset($id) ? $id : 0),
        "nom" => $nom,
        "prenom" => $prenom,
        "courriel" => $courriel,
        "sexe" => $sexe,
        "date_de_naissance" => $date_de_naissance,
        "password" => $password
    ]);
    if ($membre->checkCourriel() && !$id) {
        throw new Exception("L'adresse courriel $courriel est déjà utilisée sur un autre compte");
    }
    $register = $membre->register(true);
    //print_r()
    if ($register) {
        $message = "Admin enregistré avec succès !";
    } else {
        throw new Exception("Désolé mais l'administrateur n'a pas pu être enregsitré !");
    }
} catch (Exception $e) {
    $erreur = $e->getMessage();
}


?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Ajouter/éditer un administrateur</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Ajouter/éditer un administrateur</li>
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
            <a href="liste_admins.php" class="btn btn-success"><i class="fas fa-arrow-left"></i>&nbsp;Retour</a>
        </div>
    </main>
</div>
<?php require_once("includes/footer.php"); ?>