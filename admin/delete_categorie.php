<?php 
    require_once("includes/header.php");
    require_once("../includes/categories.php");
    $id_categorie_to_delete = $_POST["id_categorie_to_delete"];
    $erreur = "";
    $message = "";
    try{
        $categorie = new categorie(["id"=>$id_categorie_to_delete]);
        if($categorie->delete()){
            $message = "Catégorie supprimé avec succès !";
        } else {
            $erreur = "La catégorie n'a pas pu être supprimé !";
        }
    } catch(Exception $e){
        $erreur = $e->getMessage();
    }
 ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Supprimer catégorie</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Supprimer catégorie</li>
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
            <a href="liste_categories.php" class="btn btn-success"><i class="fas fa-arrow-left"></i>&nbsp;Retour</a>
        </div>
    </main>
</div>


<?php require_once("includes/footer.php"); ?>