<?php
session_start();
$relative_path_to_web_root = "../../";
require_once("../../includes/header.php");
// Extraction des données sous forme de varibales
$id = $_POST["id"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$courriel = $_POST["courriel"];
$sexe = $_POST["sexe"];
$date_de_naissance = $_POST["date_de_naissance"];
$password = $_POST["mot_de_passe"];
$confirm_mot_de_passe = $_POST["confirm_mot_de_passe"];
$message_erreur = "";

// Validation
require_once("validation.php");
require_once("../../includes/membre.php");
if (!$message_erreur) {
    try {
        $membre = new membre([
            "id" => $id,
            "nom" => $nom,
            "prenom" => $prenom,
            "courriel" => $courriel,
            "sexe" => $sexe,
            "date_de_naissance" => $date_de_naissance,
            "password" => $password
        ]);
        $register = $membre->register();
    } catch (Exception $e) {
        $message_erreur = $e->getMessage();
    }
}
?>
<header class="page-header">
    <div class="container">
        <h1>Modifier profil</h1>
    </div>
</header>
<main>
    <section class="content-section" data-background="assets/images/section-pattern01.png">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="membership" id="form_membership">
                        <?php if ($message_erreur) : ?>
                            <h4 class="msgErreur"><?php echo $message_erreur ?></h4>
                            <a class="btn btn-success btn-lg" href="pages/membre.php"><i class="lni lni-chevron-left"></i>Retour</a>
                        <?php else : ?>
                            <h1>Votre données ont bien été enregistrés !</h1>
                            <a href="pages/membre.php" class="btn brn-lg btn-primary"><i class="lni lni-arrow-left"></i> Retour</a>
                        <?php endif; ?>
                        </form>
                    </div>
                    <!-- end membership -->
                </div>
                <!-- end col-7 -->
                <div class="col-lg-5">
                    <figure class="side-image">
                        <img src="ressources/images/side-image02.png" alt="Image">
                    </figure>
                    <!-- end side-image -->
                </div>
                <!-- end col-5 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end content-section -->
    <?php
    require_once("../../includes/footer.php");
