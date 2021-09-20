<?php
session_start();
$relative_path_to_web_root = "../";
require_once("../includes/films.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $film = new film(["id" => $id]);
    $film->loadFromBd();
    $_SESSION['PANIER'][$id] = 1;
    $message = "<img > Le film $film->nom a bien été ajouté au panier !";
}
require_once("../includes/header.php");
?>
<header class="page-header">
    <div class="container">
        <h1>Panier</h1>
    </div>
</header>
<main>
    <section class="content-section">
        <div class="container-fluid">
            <?php require_once("../includes/panier.inc.php") ?>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end content-section -->
    <?php
    require_once("../includes/footer.php");
