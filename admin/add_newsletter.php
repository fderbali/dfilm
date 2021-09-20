<?php 
    require_once("includes/header.php");
    require_once("../includes/newsletter.php");
    if(isset($_POST["id"])){
        $id = $_POST["id"];
    }
    $courriel = $_POST["courriel"];
    $erreur = $message = "";
    try{
        $newsletter = new newsletter([
            "id" => (isset($id) ? $id : 0),
            "courriel"=>$courriel,
        ]);

        if($newsletter->save()){
            $message = "Courriel enregistré avec succès !";
        } else {
            $erreur = "Le courriel n'a pas pu être enregistré !";
        }
    } catch(Exception $e){
        $erreur = $e->getMessage();
    }
 ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Éditer un courriel</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Éditer un courriel</li>
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