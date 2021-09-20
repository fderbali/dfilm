<?php
require_once("includes/header.php");
require_once("../includes/newsletter.php");
$id_newsletter_to_edit = $_GET["id"];
$erreur = $message = "";
try {
    $newsletter = new newsletter(["id" => $id_newsletter_to_edit]);
    $newsletter->loadFromBd();
} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Éditer un abonné à la newsletter</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Éditer un abonné à la newslatter</li>
            </ol>
        </div>
        <div class="container-fluid">
            <form action="add_newsletter.php" method="POST" class="px-5">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="courriel">Courriel</label>
                        <input type="hidden" name="id" value="<?php echo $newsletter->id ?>" />
                        <input type="text" class="form-control" id="courriel" name="courriel" value="<?php echo $newsletter->courriel ?>" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </form>
        </div>
    </main>
    <?php require_once("includes/footer.php"); ?>