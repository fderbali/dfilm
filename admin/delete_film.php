<?php 
    require_once("includes/header.php");
    require_once("../includes/films.php");
    $id_film_to_delete = $_POST["id_film_to_delete"];
    $erreur = "";
    $message = "";
    try{
        $film = new film(["id"=>$id_film_to_delete]);
        $film->loadFromBd();
        if($film->delete_categories() && $film->delete()){
            unlink('../assets/images/pochettes/'.$film->pochette);
            $message = "Film supprimé avec succès !";
        } else {
            $erreur = "Le film n'a pas pu être supprimé !";
        }
    } catch(Exception $e){
        $erreur = $e->getMessage();
    }
 ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Supprimer film</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Supprimer film</li>
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