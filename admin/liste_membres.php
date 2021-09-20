<?php
require_once("includes/header.php");
require_once("../includes/membre.php");
$erreur = "";
try {
    $membre = new membre([]);
    $membres = $membre->getMembresList();
} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Liste des membres</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Liste des membres</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Membres
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if ($erreur) : echo $erreur; ?>
                        <?php else : ?>
                            <table class="table table-bordered" id="listeCateg" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Courriel</th>
                                        <th>Date de naissance</th>
                                        <th>Sexe</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Courriel</th>
                                        <th>Date de naissance</th>
                                        <th>Sexe</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    foreach ($membres as $membre) {
                                        echo "<tr>"
                                            . "<td>" . $membre->nom . "</td>"
                                            . "<td>" . $membre->prenom . "</td>"
                                            . "<td>" . $membre->courriel . "</td>"
                                            . "<td>" . $membre->date_de_naissance . "</td>"
                                            . "<td>" . $membre->sexe . "</td>"
                                            . "<td>
                                            <button data-id_membre='" . $membre->id . "' class='btn btn-danger deleteMembre' data-toggle='modal' data-target='#deleteMembreModal'>
                                                <i class='far fa-trash-alt'></i>
                                            </button>
                                        </td>"
                                            . "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="deleteMembreModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer un membre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Êtes vous sûr ?</h4>
                    <form action="delete_membre.php" id="formDeleteFilm" method="POST">
                        <input type="hidden" id="id_membre_to_delete" name="id_membre_to_delete" />
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Non</button>
                    <button id="BtndeleteFilm" type="button" class="btn btn-warning">Oui, Supprimer !</button>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("includes/footer.php"); ?>