<?php 
    require_once("includes/header.php");
    require_once("../includes/newsletter.php");
    $id_newsletter_to_delete = $_POST["id_newsletter_to_delete"];
    $erreur = "";
    $message = "";
    try{
        $newsletter = new newsletter(["id"=>$id_newsletter_to_delete]);
        if($newsletter->delete()){
            $message = "Abonné supprimé avec succès !";
        } else {
            $erreur = "L'abonné n'a pas pu être supprimé !";
        }
    } catch(Exception $e){
        $erreur = $e->getMessage();
    }
 ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Supprimer abonné newsletter</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Supprimer abonné newsletter</li>
            </ol>
        </div>
        <div class="container-fluid">
            <?php if($erreur): ?>
                <div class="alert alert-danger">
                    <?php echo $erreur?>
                </div>
            <?php else: ?>
                <div class="alert alert-success">
                    <?php echo $message?>
                </div>
            <?php endif; ?>
        </div>
        <div class="container-fluid">
            <a href="liste_newsletter.php" class="btn btn-success"><i class="fas fa-arrow-left"></i>&nbsp;Retour</a>
        </div>
    </main>
</div>


<?php require_once("includes/footer.php"); ?>