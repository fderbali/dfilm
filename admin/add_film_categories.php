<?php 
    require_once("includes/header.php");
    require_once("../includes/films.php");
    $erreur = $message = "";
    if(isset($_POST["id"])){
        $id = $_POST["id"];
        $film = new film(["id"=>$id]);
        $film->loadFromBd();
    }
    try{
        if($film->delete_categories() && $film->save_categories($_POST['categories'])){
            $message = "Les catégories du film $film->nom ont été enregitrés avec succès !";
        } else {
            $erreur = "Les catgories du film $film->nom n'ont pas pu être enregistrés !";
        }
    } catch(Exception $e){
        $erreur = $e->getMessage();
    }
 ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Éditer les catégories du film <?php $film->nom ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Édition de catégories</li>
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
            <a href="liste_films.php" class="btn btn-success"><i class="fas fa-arrow-left"></i>&nbsp;Retour</a>
        </div>
    </main>
</div>
<?php require_once("includes/footer.php"); ?>