<?php 
    require_once("includes/header.php");
    require_once("../includes/newsletter.php");
    $erreur = "";
    try{
        $newsletter = new newsletter([]);
        $newsletters = $newsletter->getNewsletterList();
    } catch(Exception $e){
        $erreur = $e->getMessage();
    }
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Liste des inscrits à la newsletter</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Newsletter</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Newsletter
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if($erreur): echo $erreur; ?>
                        <?php else: ?>
                        <table class="table table-bordered" id="listeNewsletter" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Courriel</th>
                                    <th>Supprimer</th>
                                    <th>Éditer</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Courriel</th>
                                    <th>Supprimer</th>
                                    <th>Éditer</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    foreach($newsletters as $newsletter){
                                        echo"<tr>"
                                            ."<td>".$newsletter->courriel."</td>"
                                            ."<td>
                                                <button data-id_newsletter='".$newsletter->id."' class='btn btn-danger deleteNewsletter' data-toggle='modal' data-target='#deleteNewsletterModal'>
                                                    <i class='far fa-trash-alt'></i>
                                                </button>
                                            </td>"
                                            ."<td>
                                                <a href='form_edit_newsletter.php?id=$newsletter->id' class='btn btn-success'>
                                                    <i class='far fa-edit'></i>
                                                </a>
                                            </td>"
                                        ."</tr>";
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
    <div class="modal fade" id="deleteNewsletterModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer un abonné newsletter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Êtes vous sûr ?</h4>
                    <form action="delete_newsletter.php" id="formDeleteFilm" method="POST">
                        <input type="hidden" id="id_newsletter_to_delete" name="id_newsletter_to_delete" />
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